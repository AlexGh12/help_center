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
</script>
