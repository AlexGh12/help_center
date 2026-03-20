@extends('HelpCenter::layout')

@section('title', 'Centro de Ayuda')

@section('css')
@include('HelpCenter::partials.css.prism')

<style>
.sidebar {
	height: calc(100vh - 200px);
	overflow-y: auto;
	padding-right: 1rem;
	border-right: 1px solid var(--border-color);
}

.sidebar h6 {
	color: var(--text-primary);
}

.sidebar .folder-item {
	margin-top: 0.5rem;
}

.sidebar .folder-toggle {
	cursor: pointer;
	user-select: none;
}

.sidebar .folder-toggle i {
	transition: transform 0.2s;
}

.sidebar .folder-toggle.collapsed i {
	transform: rotate(-90deg);
}

.sidebar .folder-children {
	padding-left: 1rem;
}

.content-area {
	padding-left: 1.5rem;
}

.markdown-body {
	font-family: inherit;
}

.markdown-body h1,
.markdown-body h2,
.markdown-body h3,
.markdown-body h4,
.markdown-body h5,
.markdown-body h6 {
	color: var(--text-primary);
}

.markdown-body h1 {
	font-size: 2rem;
	margin-bottom: 1rem;
}

.markdown-body h2 {
	font-size: 1.5rem;
	margin-top: 1.5rem;
	margin-bottom: 0.75rem;
}

.markdown-body h3 {
	font-size: 1.25rem;
	margin-top: 1.25rem;
	margin-bottom: 0.5rem;
}

.markdown-body p {
	margin-bottom: 1rem;
	line-height: 1.6;
	color: var(--text-primary);
}

.markdown-body ul, .markdown-body ol {
	margin-bottom: 1rem;
	padding-left: 1.5rem;
}

.markdown-body li {
	color: var(--text-primary);
}

.markdown-body pre {
	padding: 0;
	border-radius: 0.5rem;
	overflow-x: auto;
	margin-bottom: 1rem;
}

.markdown-body pre code[class*="language-"] {
	padding: 0;
	font-size: 0.875rem;
}

.markdown-body code:not([class*="language-"]) {
	background-color: var(--code-bg);
	color: var(--text-primary);
}

.markdown-body blockquote {
	border-left: 4px solid var(--blockquote-border);
	color: var(--blockquote-text);
}

.markdown-body table {
	width: 100%;
	margin-bottom: 1rem;
	border-collapse: collapse;
	overflow: hidden;
	border: 1px solid var(--border-color);
	border-radius: 0.5rem;
}

.markdown-body table th,
.markdown-body table td {
	border: 1px solid var(--border-color);
	padding: 0.75rem;
	text-align: left;
	vertical-align: top;
	color: var(--text-primary);
}

.markdown-body table thead th {
	background-color: var(--table-header-bg);
	color: var(--table-header-text);
	font-weight: 600;
	border-bottom: 2px solid var(--border-color);
}

.markdown-body table tbody tr {
	border-bottom: 1px solid var(--border-color);
	background-color: var(--bg-primary);
}

.markdown-body table tbody tr:last-child {
	border-bottom: none;
}

.markdown-body table tbody tr:nth-child(even) {
	background-color: var(--table-row-even);
}

.markdown-body table tbody tr:hover {
	background-color: var(--table-row-hover);
}

.markdown-body div.mermaid {
	text-align: center;
	margin: 1.5rem 0;
	padding: 1rem;
	border-radius: 0.5rem;
	overflow-x: auto;
	background-color: var(--bg-secondary);
	border: 1px solid var(--mermaid-border);
}

.markdown-body div.mermaid svg {
	max-width: 100%;
	height: auto;
}

.markdown-body .mermaid-error {
	padding: 0.5rem;
	border-radius: 0.25rem;
	font-size: 0.875rem;
	color: #dc3545;
	background-color: #f8d7da;
	border: 1px solid #f5c6cb;
}

.markdown-body a {
	color: var(--link-color);
	text-decoration: none;
}

.markdown-body a:hover {
	text-decoration: underline;
}

.markdown-body img {
	max-width: 100%;
	height: auto;
}

.markdown-body hr {
	border: none;
	border-top: 1px solid var(--border-color);
	margin: 1.5rem 0;
}

.no-content {
	color: var(--text-secondary);
	font-style: italic;
}
</style>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-3">
			<div class="sidebar">
				<h6 class="mb-3">Documentación</h6>
				<nav class="nav flex-column">
					@each('HelpCenter::partials.tree-item', $tree, 'item')
				</nav>
			</div>
		</div>
		<div class="col-md-9 content-area">
			@if($content)
				<div class="markdown-body">
					{!! $content !!}
				</div>
			@else
				<div class="no-content">
					<p>Selecciona un archivo del menú lateral para ver su contenido.</p>
				</div>
			@endif
		</div>
	</div>
@endsection

@section('javascript')
@include('HelpCenter::partials.js.prism')
@include('HelpCenter::partials.js.mermaid')
@include('HelpCenter::partials.js.init')
@endsection
