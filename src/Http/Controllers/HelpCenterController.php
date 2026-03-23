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
		$docsPath = base_path(config('HelpCenter.path_docs'));
		$selectedFile = $request->get('file');
		$defaultFile = config('HelpCenter.default_file');

		$tree = $this->buildTree($docsPath);

		$content = null;
		if ($selectedFile) {
			$filePath = base_path('resources/docs/' . $selectedFile);
			if (file_exists($filePath) && substr($filePath, -3) === '.md') {
				$markdown = File::get($filePath);
				$content = $this->converter->convert($markdown);
			}
		} elseif ($defaultFile) {
			$filePath = base_path('resources/docs/' . $defaultFile);
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
