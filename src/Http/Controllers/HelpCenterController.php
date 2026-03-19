<?php

namespace AlexGh12\HelpCenter\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use League\CommonMark\CommonMarkConverter;

class HelpCenterController extends Controller
{
	protected $converter;

	public function __construct()
	{
		$this->converter = new CommonMarkConverter([
			'allow_unsafe_links' => false,
		]);
	}

	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request)
	{
		$docsPath = base_path(config('HelpCenter.path_docs'));
		$selectedFile = $request->get('file');

		$tree = $this->buildTree($docsPath);

		$content = null;
		if ($selectedFile) {
			$filePath = base_path($selectedFile);
			if (file_exists($filePath) && str_ends_with($filePath, '.md')) {
				$markdown = File::get($filePath);
				$content = $this->converter->convert($markdown);
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
			if (str_ends_with($file->getFilename(), '.md')) {
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

	/**
	 * Show the form for creating a new resource.
	 */
	public function create(Request $request)
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}
}
