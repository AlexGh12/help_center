@extends('HelpCenter::layout')

@section('title', 'Centro de Ayuda')

@section('css')
<style>
code[class*="language-"],
pre[class*="language-"] {
	color: #f8f8f2;
	background: #272822;
	text-shadow: 0 1px rgba(0, 0, 0, 0.3);
	font-family: Consolas, Monaco, 'Andale Mono', 'Ubuntu Mono', monospace;
	font-size: 0.875rem;
	text-align: left;
	white-space: pre;
	word-spacing: normal;
	word-break: normal;
	word-wrap: normal;
	line-height: 1.5;
	tab-size: 4;
	hyphens: none;
}

pre[class*="language-"] {
	padding: 1em;
	margin: 0 0 1em 0;
	overflow: auto;
	border-radius: 0.5rem;
	background: #272822;
}

:not(pre) > code[class*="language-"] {
	padding: .1em .3em;
	border-radius: .3em;
	white-space: normal;
	background: #272822;
}

.token.comment,
.token.prolog,
.token.doctype,
.token.cdata {
	color: #75715e;
}

.token.punctuation {
	color: #f8f8f2;
}

.namespace {
	opacity: .7;
}

.token.property,
.token.tag,
.token.boolean,
.token.constant,
.token.symbol,
.token.deleted {
	color: #f92672;
}

.token.number {
	color: #ae81ff;
}

.token.selector,
.token.attr-name,
.token.string,
.token.char,
.token.builtin,
.token.inserted {
	color: #a6e22e;
}

.token.operator,
.token.entity,
.token.url,
.language-css .token.string,
.style .token.string {
	color: #f8f8f2;
}

.token.atrule,
.token.attr-value,
.token.keyword {
	color: #66d9ef;
}

.token.function,
.token.class-name {
	color: #e6db74;
}

.token.regex,
.token.important,
.token.variable {
	color: #fd971f;
}

.token.important,
.token.bold {
	font-weight: bold;
}

.token.italic {
	font-style: italic;
}

.token.entity {
	cursor: help;
}

.token {
	display: inline;
}

.token.namespace {
	opacity: 0.7;
}

.language-json .token.property {
	color: #f92672;
}

.language-json .token.string {
	color: #a6e22e;
}

.language-json .token.number {
	color: #ae81ff;
}

.language-json .token.boolean,
.language-json .token.null {
	color: #66d9ef;
}

.language-json .token.punctuation {
	color: #f8f8f2;
}

.language-php .token.keyword {
	color: #66d9ef;
}

.language-php .token.string {
	color: #a6e22e;
}

.language-php .token.number {
	color: #ae81ff;
}

.language-php .token.function {
	color: #e6db74;
}

.language-sql .token.keyword {
	color: #66d9ef;
}

.language-sql .token.string {
	color: #a6e22e;
}

.language-sql .token.function {
	color: #e6db74;
}

.language-bash .token.function {
	color: #a6e22e;
}

.language-bash .token.string {
	color: #e6db74;
}

.language-css .token.property {
	color: #f92672;
}

.language-css .token.selector {
	color: #a6e22e;
}

.language-css .token.keyword {
	color: #66d9ef;
}

.language-markup .token.tag {
	color: #f92672;
}

.language-markup .token.attr-name {
	color: #a6e22e;
}

.language-markup .token.attr-value {
	color: #e6db74;
}

pre.language-bash > code,
pre.language-shell > code {
	color: #f8f8f2;
}

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-markup-templating.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-markup.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-css.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-clike.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-bash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-javascript.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-json.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-sql.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-php.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/mermaid@10/dist/mermaid.min.js"></script>
<script>
	function getMermaidTheme() {
		const theme = document.documentElement.getAttribute('data-theme');
		return theme === 'dark' ? 'dark' : 'default';
	}

	mermaid.initialize({
		startOnLoad: false,
		theme: getMermaidTheme(),
		securityLevel: 'loose',
		flowchart: {
			htmlLabels: true,
			curve: 'basis'
		},
		sequence: {
			actorMargin: 50,
			messageMargin: 40
		}
	});

	function renderMermaid() {
		if (typeof mermaid !== 'undefined') {
			mermaid.initialize({
				theme: getMermaidTheme()
			});
			mermaid.run({
				querySelector: '.mermaid'
			});
		}
	}

	document.addEventListener('DOMContentLoaded', function() {
		document.querySelectorAll('.markdown-body table').forEach(function(table) {
			table.classList.add('table', 'table-bordered', 'table-striped');
		});

		document.querySelectorAll('.folder-toggle').forEach(function(toggle) {
			toggle.addEventListener('click', function() {
				this.classList.toggle('collapsed');
				const children = this.nextElementSibling;
				if (children) {
					children.classList.toggle('d-none');
				}
			});
		});

		document.querySelectorAll('pre code.language-mermaid').forEach(function(el) {
			const pre = el.parentNode;
			const code = el.textContent || el.innerText;
			const div = document.createElement('div');
			div.className = 'mermaid';
			div.textContent = code;
			pre.parentNode.replaceChild(div, pre);
		});

		renderMermaid();

		if (typeof Prism !== 'undefined') {
			Prism.highlightAll();
		}
	});

	const observer = new MutationObserver(function(mutations) {
		mutations.forEach(function(mutation) {
			if (mutation.attributeName === 'data-theme') {
				renderMermaid();
			}
		});
	});

	observer.observe(document.documentElement, { attributes: true });
</script>
@endsection
