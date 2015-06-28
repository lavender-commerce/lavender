<!DOCTYPE html>
<html>
<head>
	<style>
		body {
			margin: 0;
			padding: 0;
			width: 100%;
			height: 100%;
			color: #B0BEC5;
			font-weight: 100;
		}
        main {
            width: 900px;
            margin: 0 auto;
            position: relative;
        }

		.container {
		}

		.content {
			text-align: center;
		}

		.title {
			font-size: 72px;
			margin-bottom: 40px;
		}

		.description {
			font-size: 24px;
		}
        .trace {
            text-align: left;
            overflow: scroll;
            height: 300px;
        }
        code {
            font-family: Menlo, Monaco, Consolas, "Courier New", monospace;
            padding: 2px 4px;
            font-size: 90%;
            color: #c7254e;
            background-color: #f9f2f4;
            border-radius: 4px;
        }
	</style>
</head>
<body class="error-page">
	<main>
		<div class="container">
			@yield('message')
		</div>
	</main>
</body>
</html>