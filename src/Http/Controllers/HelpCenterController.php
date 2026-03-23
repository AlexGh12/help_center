<?php

namespace AlexGh12\HelpCenter\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\Table\TableExtension;
use League\CommonMark\MarkdownConverter;

class HelpCenterController extends Controller
{
	protected $converter;

	public function __construct()
	{
		$environment = new Environment([
			'allow_unsafe_links' => false,
			'html_input' => 'escape',
		]);

		$environment->addExtension(new CommonMarkCoreExtension());
		$environment->addExtension(new TableExtension());

		$this->converter = new MarkdownConverter($environment);
	}

	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request)
	{
		$docsPath = $this->getDocsPath();
		$selectedFile = $request->get('file');
		$defaultFile = config('HelpCenter.default_file');

		$tree = $this->buildTree($docsPath);

		$content = null;
		if ($selectedFile) {
			$filePath = $docsPath . '/' . $selectedFile;
			if (file_exists($filePath) && substr($filePath, -3) === '.md') {
				$markdown = File::get($filePath);
				$content = $this->converter->convert($markdown);
			}
		} elseif ($defaultFile) {
			$filePath = $docsPath . '/' . $defaultFile;
			if (file_exists($filePath) && substr($filePath, -3) === '.md') {
				$markdown = File::get($filePath);
				$content = $this->converter->convert($markdown);
				$selectedFile = $defaultFile;
			}
		}

		return view('HelpCenter::index', [
			'tree' => $tree,
			'content' => $content,
			'selectedFile' => $selectedFile,
		]);
	}

	/**
	 * Determine the docs path based on user role.
	 */
	protected function getDocsPath(): string
	{
		$basePath = base_path(config('HelpCenter.path_docs'));
		$roleColumn = config('HelpCenter.role_column');
		$rolePaths = config('HelpCenter.role_paths');

		if (! $roleColumn || ! $rolePaths) {
			return $basePath;
		}

		if (! auth()->check()) {
			return $basePath . '/public';
		}

		$user = auth()->user();
		$roleValue = $this->getUserRoleValue($user, $roleColumn);

		if (! $roleValue) {
			return $basePath . '/public';
		}

		$roleDocsPath = $basePath . '/' . $rolePaths[$roleValue];

		if (File::isDirectory($roleDocsPath)) {
			return $roleDocsPath;
		}

		$publicPath = $basePath . '/public';
		if (File::isDirectory($publicPath)) {
			return $publicPath;
		}

		return $basePath;
	}

	/**
	 * Get user role value from model.
	 */
	protected function getUserRoleValue($user, string $roleColumn)
	{
		if (isset($user->{$roleColumn})) {
			return $user->{$roleColumn};
		}

		return null;
	}

	/**
	 * Build navigation tree from directory.
	 */
	protected function buildTree(string $path, string $basePath = ''): array
	{
		$items = [];
		$directories = [];
		$files = [];

		if (! File::isDirectory($path)) {
			return [];
		}

		$itemsList = File::directories($path);
		foreach ($itemsList as $dir) {
			$dirName = basename($dir);
			$dirPath = ltrim($basePath . '/' . $dirName, '/');
			$directories[$dirName] = [
				'name' => $dirName,
				'path' => $dirPath,
				'children' => $this->buildTree($dir, $dirPath),
			];
		}

		$fileList = File::files($path);
		foreach ($fileList as $file) {
			if (substr($file->getFilename(), -3) === '.md') {
				$fileName = $file->getFilename();
				$filePath = ltrim($basePath . '/' . $fileName, '/');
				$files[$fileName] = [
					'name' => pathinfo($fileName, PATHINFO_FILENAME),
					'path' => $filePath,
				];
			}
		}

		ksort($directories);
		ksort($files);

		return array_merge($directories, $files);
	}
}
