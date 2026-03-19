@extends('HelpCenter::layout')

@section('title', 'Centro de Ayuda')

@section('css')
<style>
code[class*="language-"],
pre[class*="language-"] {
	color: #f8f8f2;
	background: none;
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
	margin: 0;
	overflow: auto;
	border-radius: 0.5rem;
}

:not(pre) > code[class*="language-"] {
	padding: .1em .3em;
	border-radius: .3em;
	white-space: normal;
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
.token.constant,
.token.symbol,
.token.deleted {
	color: #f92672;
}

.token.boolean,
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
.style .token.string,
.token.variable {
	color: #f8f8f2;
}

.token.atrule,
.token.attr-value,
.token.function,
.token.class-name {
	color: #e6db74;
}

.token.keyword {
	color: #66d9ef;
}

.token.regex,
.token.important {
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

pre.language-bash > code,
pre.language-shell > code {
	color: #f8f8f2;
}
	.sidebar {
		height: calc(100vh - 200px);
		overflow-y: auto;
		border-right: 1px solid #dee2e6;
		padding-right: 1rem;
	}

	.sidebar .nav-link {
		color: #333;
		padding: 0.25rem 0.5rem;
		font-size: 0.9rem;
	}

	.sidebar .nav-link:hover {
		background-color: #f8f9fa;
	}

	.sidebar .nav-link.active {
		background-color: #e7f1ff;
		color: #0d6efd;
		font-weight: 500;
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
	}

	.markdown-body ul, .markdown-body ol {
		margin-bottom: 1rem;
		padding-left: 1.5rem;
	}

	.markdown-body code {
		background-color: #f4f4f4;
		padding: 0.125rem 0.375rem;
		border-radius: 0.25rem;
		font-size: 0.875em;
	}

	.markdown-body pre {
		padding: 1rem;
		border-radius: 0.5rem;
		overflow-x: auto;
		margin-bottom: 1rem;
	}

	.markdown-body pre[class*="language-"] {
		background: #272822;
	}

	.markdown-body pre code {
		background: none;
		padding: 0;
		font-size: 0.875rem;
	}

	.markdown-body blockquote {
		border-left: 4px solid #dee2e6;
		padding-left: 1rem;
		color: #6c757d;
		margin-bottom: 1rem;
	}

	.markdown-body table {
		width: 100%;
		margin-bottom: 1rem;
		border-collapse: collapse;
		border-radius: 0.5rem;
		overflow: hidden;
	}

	.markdown-body th, .markdown-body td {
		border: 1px solid #dee2e6;
		padding: 0.75rem;
		text-align: left;
	}

	.markdown-body thead th {
		background-color: #343a40;
		color: #fff;
		font-weight: 600;
	}

	.markdown-body tbody tr:nth-child(even) {
		background-color: #f8f9fa;
	}

	.markdown-body tbody tr:hover {
		background-color: #e9ecef;
	}

	.markdown-body a {
		color: #0d6efd;
		text-decoration: none;
	}

	.markdown-body a:hover {
		text-decoration: underline;
	}

	.markdown-body img {
		max-width: 100%;
		height: auto;
	}

	.no-content {
		color: #6c757d;
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-php.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-bash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-javascript.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-json.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-sql.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-css.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-markup.min.js"></script>
<script>
	document.addEventListener('DOMContentLoaded', function() {
		Prism.highlightAll();

		document.querySelectorAll('.folder-toggle').forEach(function(toggle) {
			toggle.addEventListener('click', function() {
				this.classList.toggle('collapsed');
				const children = this.nextElementSibling;
				if (children) {
					children.classList.toggle('d-none');
				}
			});
		});
	});
</script>
@endsection
