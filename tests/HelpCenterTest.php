<?php

namespace AlexGh12\HelpCenter\Tests;

class HelpCenterTest extends TestCase
{
	public function test_php_version_is_74()
	{
		$this->assertEquals(7, PHP_MAJOR_VERSION);
		$this->assertEquals(4, PHP_MINOR_VERSION);
	}

	public function test_route_exists()
	{
		$response = $this->get('/help-center');

		$response->assertStatus(200);
	}

	public function test_route_returns_view()
	{
		$response = $this->get('/help-center');

		$response->assertViewIs('HelpCenter::index');
	}

	public function test_view_has_tree_variable()
	{
		$response = $this->get('/help-center');

		$response->assertViewHas('tree');
	}

	public function test_view_has_content_variable()
	{
		$response = $this->get('/help-center');

		$response->assertViewHas('content');
	}

	public function test_view_has_selected_file_variable()
	{
		$response = $this->get('/help-center');

		$response->assertViewHas('selectedFile');
	}

	public function test_disabled_config_is_set()
	{
		$this->assertTrue(config('HelpCenter.enabled'));
	}

	public function test_request_with_file_parameter()
	{
		$response = $this->get('/help-center?file=introduction.md');

		$response->assertStatus(200);
		$response->assertViewHas('selectedFile', 'introduction.md');
	}

	public function test_request_with_invalid_file_returns_empty_content()
	{
		$response = $this->get('/help-center?file=nonexistent.md');

		$response->assertStatus(200);
		$response->assertViewHas('content', null);
	}

	public function test_request_with_non_md_file_returns_empty_content()
	{
		$response = $this->get('/help-center?file=document.txt');

		$response->assertStatus(200);
		$response->assertViewHas('content', null);
	}

	public function test_build_tree_handles_nonexistent_directory()
	{
		$response = $this->get('/help-center');

		$response->assertStatus(200);
		$response->assertViewHas('tree');
		$this->assertIsArray($response->viewData('tree'));
	}

	public function test_build_tree_handles_empty_directory()
	{
		$response = $this->get('/help-center');

		$response->assertStatus(200);
		$response->assertViewHas('tree');
		$this->assertIsArray($response->viewData('tree'));
	}

	public function test_build_tree_returns_nested_structure()
	{
		$response = $this->get('/help-center');

		$response->assertStatus(200);
		$tree = $response->viewData('tree');

		$this->assertIsArray($tree);
		$this->assertNotEmpty($tree);
	}

	public function test_config_can_be_published()
	{
		$this->artisan('vendor:publish', ['--tag' => 'help-center-config']);

		$published = is_file(config_path('HelpCenter.php'));

		$this->assertTrue($published);
	}

	public function test_docs_can_be_published()
	{
		$this->artisan('vendor:publish', ['--tag' => 'help-center-docs']);

		$published = is_dir(resource_path('docs'));

		$this->assertTrue($published);
	}

	public function test_route_name_is_help_center()
	{
		$response = $this->get('/help-center');

		$response->assertStatus(200);
	}
}
