**Create .env file (in /.env folder)**
WEB_HOST=""
WEB_USER=""
WEB_PASS=""

**Create sftp.json file (in /.vscode/sftp.json folder)**
[
{
"name": "theme",
"context": "/",
"host": "${ENV:WEB_HOST}",
        "username": "${ENV:WEB_USER}",
"password": "${ENV:WEB_PASS}",
"remotePath": "/",
"uploadOnSave": true,
"ignore": [
".git",
".vscode",
"node_modules"
],
"profiles": {
"dev": {
"remotePath": ""
},
"prod": {
"remotePath": ""
}
},
"defaultProfile": "dev"
}
]
