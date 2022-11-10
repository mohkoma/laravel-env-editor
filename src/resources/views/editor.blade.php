<!DOCTYPE html>
<html>
<head>
    <title>Site Environment</title>
    <meta charset="UTF-8" />
    <meta name=”robots” content=”noindex,nofollow”>
    <link rel="stylesheet" href="/vendor/env-editor/styles.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:400,500,600,700" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.12.5/ace.js" integrity="sha512-gLQA+KKlMRzGRNhdvGX+3F5UHojWkIIKvG2lNQk0ZM5QUbdG17/hDobp06zXMthrJrd4U1+boOEACntTGlPjJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js" integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="container">
        <div class="error-box" id="error">
            <svg class="error-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none"><path fill-rule="evenodd" d="M1.668 10c0-4.602 3.731-8.333 8.333-8.333 2.21 0 4.33.878 5.893 2.441S18.335 7.79 18.335 10c0 4.602-3.731 8.333-8.333 8.333S1.668 14.602 1.668 10zm1.667 0a6.67 6.67 0 0 0 6.667 6.667c1.768 0 3.464-.702 4.714-1.953s1.953-2.946 1.953-4.714a6.67 6.67 0 0 0-6.667-6.667A6.67 6.67 0 0 0 3.335 10zm7.5.417c0-.23-.187-.417-.417-.417h-.833c-.23 0-.417.187-.417.417v2.5c0 .23.187.417.417.417h.833c.23 0 .417-.186.417-.417v-2.5zm-.417-3.75c.23 0 .417.187.417.417v.833c0 .23-.187.417-.417.417h-.833c-.23 0-.417-.187-.417-.417v-.833c0-.23.187-.417.417-.417h.833z" fill="currentColor"></path></svg>
            <p id="error-message"><p>
        </div>
        <div class="card">
            <div class="main">
                <h3>Site Enviroment</h3>
                <div class="info-box">
                    <svg class="info-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none"><path fill-rule="evenodd" d="M1.668 10c0-4.602 3.731-8.333 8.333-8.333 2.21 0 4.33.878 5.893 2.441S18.335 7.79 18.335 10c0 4.602-3.731 8.333-8.333 8.333S1.668 14.602 1.668 10zm1.667 0a6.67 6.67 0 0 0 6.667 6.667c1.768 0 3.464-.702 4.714-1.953s1.953-2.946 1.953-4.714a6.67 6.67 0 0 0-6.667-6.667A6.67 6.67 0 0 0 3.335 10zm7.5.417c0-.23-.187-.417-.417-.417h-.833c-.23 0-.417.187-.417.417v2.5c0 .23.187.417.417.417h.833c.23 0 .417-.186.417-.417v-2.5zm-.417-3.75c.23 0 .417.187.417.417v.833c0 .23-.187.417-.417.417h-.833c-.23 0-.417-.187-.417-.417v-.833c0-.23.187-.417.417-.417h.833z" fill="currentColor"></path></svg>
                    <p>Below you may edit the <b>.env</b> file for your application, which is the default environment file that is loaded by Laravel applications. Please be aware of what you are doing.</p>
                </div>
                <div class="spinner" id="spinner">
                    <img width="50" src="/vendor/env-editor/loader.gif"/>
                    <h2><b>Loading...</b></h2>
                </div>
                <div class="holder">
                    <div id="editor" class="scrollbar">{{ $environment }}</div>
                </div>
                <div class="buttons">
                    <button onclick="reload()" class="reload">Reload</button>
                    <button onclick="save()" class="save">Save</button>
                </div>
            </div>
        </div>
    </div>
    <script src="/vendor/env-editor/index.js"></script>
</body>
</html>