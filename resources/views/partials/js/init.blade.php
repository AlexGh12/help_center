<script>
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
