<style>
	@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css");

	:root,
	[data-theme="light"] {
		--bg-primary: #ffffff;
		--bg-secondary: #f8f9fa;
		--bg-tertiary: #e9ecef;
		--text-primary: #212529;
		--text-secondary: #6c757d;
		--border-color: #dee2e6;
		--link-color: #0d6efd;
		--link-hover-color: #0a58ca;
		--card-bg: #ffffff;
		--card-border: #dee2e6;
		--table-header-bg: #343a40;
		--table-header-text: #ffffff;
		--table-row-even: #f8f9fa;
		--table-row-hover: #e9ecef;
		--code-bg: #f4f4f4;
		--code-block-bg: #272822;
		--blockquote-border: #dee2e6;
		--blockquote-text: #6c757d;
		--sidebar-bg: transparent;
		--sidebar-hover: #f8f9fa;
		--sidebar-active-bg: #e7f1ff;
		--sidebar-active-text: #0d6efd;
		--mermaid-bg: transparent;
		--mermaid-border: #dee2e6;
	}

	[data-theme="dark"] {
		--bg-primary: #121212;
		--bg-secondary: #1e1e1e;
		--bg-tertiary: #2d2d2d;
		--text-primary: #e0e0e0;
		--text-secondary: #a0a0a0;
		--border-color: #404040;
		--link-color: #6ea8fe;
		--link-hover-color: #9ec5fe;
		--card-bg: #1e1e1e;
		--card-border: #404040;
		--table-header-bg: #2d2d2d;
		--table-header-text: #ffffff;
		--table-row-even: #1e1e1e;
		--table-row-hover: #2d2d2d;
		--code-bg: #2d2d2d;
		--code-block-bg: #1e1e1e;
		--blockquote-border: #404040;
		--blockquote-text: #a0a0a0;
		--sidebar-bg: transparent;
		--sidebar-hover: #1e1e1e;
		--sidebar-active-bg: #0d3055;
		--sidebar-active-text: #6ea8fe;
		--mermaid-bg: #1e1e1e;
		--mermaid-border: #404040;
	}

	* {
		transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
	}

	body {
		background-color: var(--bg-primary);
		color: var(--text-primary);
	}

	a {
		color: var(--link-color);
	}

	a:hover {
		color: var(--link-hover-color);
	}

	.breadcrumb {
		background-color: var(--bg-secondary);
		border-radius: 0.5rem;
		padding: 0.75rem 1rem;
	}

	.breadcrumb-item a {
		color: var(--link-color);
	}

	.breadcrumb-item.active {
		color: var(--text-secondary);
	}

	.card {
		background-color: var(--card-bg);
		border-color: var(--card-border);
	}

	.card-body {
		color: var(--text-primary);
	}

	.sidebar {
		background-color: var(--sidebar-bg);
		border-right-color: var(--border-color) !important;
	}

	.sidebar h6 {
		color: var(--text-primary);
	}

	.sidebar .nav-link {
		color: var(--text-primary);
		border-radius: 0.375rem;
	}

	.sidebar .nav-link:hover {
		background-color: var(--sidebar-hover);
		color: var(--text-primary);
	}

	.sidebar .nav-link.active {
		background-color: var(--sidebar-active-bg);
		color: var(--sidebar-active-text);
		font-weight: 500;
	}

	.sidebar .folder-toggle {
		color: var(--text-primary);
	}

	.sidebar .folder-toggle:hover {
		background-color: var(--sidebar-hover);
	}

	.sidebar .folder-children {
		border-left: 2px solid var(--border-color);
		margin-left: 0.5rem;
	}

	.sidebar .folder-children .nav-link {
		padding-left: 0.75rem;
		font-size: 0.875rem;
	}

	.markdown-body {
		background-color: var(--bg-primary);
		color: var(--text-primary);
	}

	.markdown-body h1,
	.markdown-body h2,
	.markdown-body h3,
	.markdown-body h4,
	.markdown-body h5,
	.markdown-body h6 {
		color: var(--text-primary);
	}

	.markdown-body p {
		color: var(--text-primary);
	}

	.markdown-body a {
		color: var(--link-color);
	}

	.markdown-body blockquote {
		border-left-color: var(--blockquote-border);
		color: var(--blockquote-text);
	}

	.markdown-body del,
	.markdown-body s,
	.markdown-body strike {
		color: var(--text-secondary);
		text-decoration: line-through;
	}

	.markdown-body mark {
		background-color: #fff3cd;
		color: #212529;
		padding: 0.125rem 0.25rem;
		border-radius: 0.25rem;
	}

	[data-theme="dark"] .markdown-body mark {
		background-color: #664d03;
		color: #ffffff;
	}

	.markdown-body hr {
		border: none;
		border-top: 1px solid var(--border-color);
		margin: 1.5rem 0;
	}

	.markdown-body ul,
	.markdown-body ol {
		color: var(--text-primary);
	}

	.markdown-body li {
		color: var(--text-primary);
	}

	.markdown-body dt {
		color: var(--text-primary);
		font-weight: 600;
	}

	.markdown-body dd {
		color: var(--text-secondary);
		margin-left: 1.5rem;
	}

	.markdown-body code:not([class*="language-"]) {
		background-color: var(--code-bg);
		color: var(--text-primary);
	}

	.markdown-body pre {
		background-color: var(--code-block-bg) !important;
	}

	.markdown-body pre[class*="language-"] {
		background-color: var(--code-block-bg) !important;
	}

	.markdown-body table.table {
		border-color: var(--border-color);
	}

	.markdown-body table.table th,
	.markdown-body table.table td {
		border-color: var(--border-color);
		color: var(--text-primary);
	}

	.markdown-body table.table thead th {
		background-color: var(--table-header-bg);
		color: var(--table-header-text);
		border-color: var(--border-color);
	}

	.markdown-body table.table tbody tr {
		background-color: var(--bg-primary);
		border-color: var(--border-color);
	}

	.markdown-body table.table tbody tr:nth-child(even) {
		background-color: var(--table-row-even);
	}

	.markdown-body table.table.table-striped tbody tr:nth-child(odd) {
		background-color: var(--bg-primary);
	}

	.markdown-body table.table.table-striped tbody tr:nth-child(even) {
		background-color: var(--table-row-even);
	}

	.markdown-body table.table tbody tr:hover {
		background-color: var(--table-row-hover);
	}

	.markdown-body table.table.table-bordered {
		border: 2px solid var(--border-color);
	}

	.markdown-body div.mermaid {
		background-color: var(--mermaid-bg);
		border: 1px solid var(--mermaid-border);
	}

	.no-content {
		color: var(--text-secondary);
	}

	.theme-toggle {
		cursor: pointer;
		padding: 0.5rem;
		border-radius: 0.5rem;
		border: 1px solid var(--border-color);
		background-color: var(--bg-secondary);
		color: var(--text-primary);
		display: flex;
		align-items: center;
		justify-content: center;
		transition: all 0.3s ease;
	}

	.theme-toggle:hover {
		background-color: var(--bg-tertiary);
	}

	.theme-toggle i {
		font-size: 1.25rem;
	}

	[data-theme="dark"] .theme-toggle .bi-sun {
		display: inline;
	}

	[data-theme="dark"] .theme-toggle .bi-moon {
		display: none;
	}

	[data-theme="light"] .theme-toggle .bi-sun {
		display: none;
	}

	[data-theme="light"] .theme-toggle .bi-moon {
		display: inline;
	}
</style>
