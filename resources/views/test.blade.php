"{\n    \"message\": \"SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= ?' at line 1 (Connection: mysql, SQL: select * from `tasks` where date(`start_date`) = 2023-05-22 or date(`end_date`) == 2023)\",\n    \"exception\": \"Illuminate\\\\Database\\\\QueryException\",\n    \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Connection.php\",\n    \"line\": 793,\n    \"trace\": [\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Connection.php\",\n            \"line\": 753,\n            \"function\": \"runQueryCallback\",\n            \"class\": \"Illuminate\\\\Database\\\\Connection\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Connection.php\",\n            \"line\": 422,\n            \"function\": \"run\",\n            \"class\": \"Illuminate\\\\Database\\\\Connection\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Query\\\\Builder.php\",\n            \"line\": 2719,\n            \"function\": \"select\",\n            \"class\": \"Illuminate\\\\Database\\\\Connection\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Query\\\\Builder.php\",\n            \"line\": 2707,\n            \"function\": \"runSelect\",\n            \"class\": \"Illuminate\\\\Database\\\\Query\\\\Builder\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Query\\\\Builder.php\",\n            \"line\": 3248,\n            \"function\": \"Illuminate\\\\Database\\\\Query\\\\{closure}\",\n            \"class\": \"Illuminate\\\\Database\\\\Query\\\\Builder\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Query\\\\Builder.php\",\n            \"line\": 2708,\n            \"function\": \"onceWithColumns\",\n            \"class\": \"Illuminate\\\\Database\\\\Query\\\\Builder\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\Builder.php\",\n            \"line\": 717,\n            \"function\": \"get\",\n            \"class\": \"Illuminate\\\\Database\\\\Query\\\\Builder\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\Builder.php\",\n            \"line\": 701,\n            \"function\": \"getModels\",\n            \"class\": \"Illuminate\\\\Database\\\\Eloquent\\\\Builder\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\app\\\\Http\\\\Controllers\\\\TaskController.php\",\n            \"line\": 257,\n            \"function\": \"get\",\n            \"class\": \"Illuminate\\\\Database\\\\Eloquent\\\\Builder\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\Controller.php\",\n            \"line\": 54,\n            \"function\": \"filter\",\n            \"class\": \"App\\\\Http\\\\Controllers\\\\TaskController\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\ControllerDispatcher.php\",\n            \"line\": 43,\n            \"function\": \"callAction\",\n            \"class\": \"Illuminate\\\\Routing\\\\Controller\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\Route.php\",\n            \"line\": 260,\n            \"function\": \"dispatch\",\n            \"class\": \"Illuminate\\\\Routing\\\\ControllerDispatcher\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\Route.php\",\n            \"line\": 205,\n            \"function\": \"runController\",\n            \"class\": \"Illuminate\\\\Routing\\\\Route\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\Router.php\",\n            \"line\": 798,\n            \"function\": \"run\",\n            \"class\": \"Illuminate\\\\Routing\\\\Route\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Pipeline\\\\Pipeline.php\",\n            \"line\": 141,\n            \"function\": \"Illuminate\\\\Routing\\\\{closure}\",\n            \"class\": \"Illuminate\\\\Routing\\\\Router\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\Middleware\\\\SubstituteBindings.php\",\n            \"line\": 50,\n            \"function\": \"Illuminate\\\\Pipeline\\\\{closure}\",\n            \"class\": \"Illuminate\\\\Pipeline\\\\Pipeline\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Pipeline\\\\Pipeline.php\",\n            \"line\": 180,\n            \"function\": \"handle\",\n            \"class\": \"Illuminate\\\\Routing\\\\Middleware\\\\SubstituteBindings\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\VerifyCsrfToken.php\",\n            \"line\": 78,\n            \"function\": \"Illuminate\\\\Pipeline\\\\{closure}\",\n            \"class\": \"Illuminate\\\\Pipeline\\\\Pipeline\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Pipeline\\\\Pipeline.php\",\n            \"line\": 180,\n            \"function\": \"handle\",\n            \"class\": \"Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\VerifyCsrfToken\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\View\\\\Middleware\\\\ShareErrorsFromSession.php\",\n            \"line\": 49,\n            \"function\": \"Illuminate\\\\Pipeline\\\\{closure}\",\n            \"class\": \"Illuminate\\\\Pipeline\\\\Pipeline\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Pipeline\\\\Pipeline.php\",\n            \"line\": 180,\n            \"function\": \"handle\",\n            \"class\": \"Illuminate\\\\View\\\\Middleware\\\\ShareErrorsFromSession\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Session\\\\Middleware\\\\StartSession.php\",\n            \"line\": 121,\n            \"function\": \"Illuminate\\\\Pipeline\\\\{closure}\",\n            \"class\": \"Illuminate\\\\Pipeline\\\\Pipeline\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Session\\\\Middleware\\\\StartSession.php\",\n            \"line\": 64,\n            \"function\": \"handleStatefulRequest\",\n            \"class\": \"Illuminate\\\\Session\\\\Middleware\\\\StartSession\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Pipeline\\\\Pipeline.php\",\n            \"line\": 180,\n            \"function\": \"handle\",\n            \"class\": \"Illuminate\\\\Session\\\\Middleware\\\\StartSession\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Cookie\\\\Middleware\\\\AddQueuedCookiesToResponse.php\",\n            \"line\": 37,\n            \"function\": \"Illuminate\\\\Pipeline\\\\{closure}\",\n            \"class\": \"Illuminate\\\\Pipeline\\\\Pipeline\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Pipeline\\\\Pipeline.php\",\n            \"line\": 180,\n            \"function\": \"handle\",\n            \"class\": \"Illuminate\\\\Cookie\\\\Middleware\\\\AddQueuedCookiesToResponse\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Cookie\\\\Middleware\\\\EncryptCookies.php\",\n            \"line\": 67,\n            \"function\": \"Illuminate\\\\Pipeline\\\\{closure}\",\n            \"class\": \"Illuminate\\\\Pipeline\\\\Pipeline\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Pipeline\\\\Pipeline.php\",\n            \"line\": 180,\n            \"function\": \"handle\",\n            \"class\": \"Illuminate\\\\Cookie\\\\Middleware\\\\EncryptCookies\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Pipeline\\\\Pipeline.php\",\n            \"line\": 116,\n            \"function\": \"Illuminate\\\\Pipeline\\\\{closure}\",\n            \"class\": \"Illuminate\\\\Pipeline\\\\Pipeline\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\Router.php\",\n            \"line\": 799,\n            \"function\": \"then\",\n            \"class\": \"Illuminate\\\\Pipeline\\\\Pipeline\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\Router.php\",\n            \"line\": 776,\n            \"function\": \"runRouteWithinStack\",\n            \"class\": \"Illuminate\\\\Routing\\\\Router\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\Router.php\",\n            \"line\": 740,\n            \"function\": \"runRoute\",\n            \"class\": \"Illuminate\\\\Routing\\\\Router\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\Router.php\",\n            \"line\": 729,\n            \"function\": \"dispatchToRoute\",\n            \"class\": \"Illuminate\\\\Routing\\\\Router\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Foundation\\\\Http\\\\Kernel.php\",\n            \"line\": 200,\n            \"function\": \"dispatch\",\n            \"class\": \"Illuminate\\\\Routing\\\\Router\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Pipeline\\\\Pipeline.php\",\n            \"line\": 141,\n            \"function\": \"Illuminate\\\\Foundation\\\\Http\\\\{closure}\",\n            \"class\": \"Illuminate\\\\Foundation\\\\Http\\\\Kernel\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\TransformsRequest.php\",\n            \"line\": 21,\n            \"function\": \"Illuminate\\\\Pipeline\\\\{closure}\",\n            \"class\": \"Illuminate\\\\Pipeline\\\\Pipeline\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\ConvertEmptyStringsToNull.php\",\n            \"line\": 31,\n            \"function\": \"handle\",\n            \"class\": \"Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\TransformsRequest\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Pipeline\\\\Pipeline.php\",\n            \"line\": 180,\n            \"function\": \"handle\",\n            \"class\": \"Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\ConvertEmptyStringsToNull\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\TransformsRequest.php\",\n            \"line\": 21,\n            \"function\": \"Illuminate\\\\Pipeline\\\\{closure}\",\n            \"class\": \"Illuminate\\\\Pipeline\\\\Pipeline\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\TrimStrings.php\",\n            \"line\": 40,\n            \"function\": \"handle\",\n            \"class\": \"Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\TransformsRequest\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Pipeline\\\\Pipeline.php\",\n            \"line\": 180,\n            \"function\": \"handle\",\n            \"class\": \"Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\TrimStrings\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\ValidatePostSize.php\",\n            \"line\": 27,\n            \"function\": \"Illuminate\\\\Pipeline\\\\{closure}\",\n            \"class\": \"Illuminate\\\\Pipeline\\\\Pipeline\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Pipeline\\\\Pipeline.php\",\n            \"line\": 180,\n            \"function\": \"handle\",\n            \"class\": \"Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\ValidatePostSize\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\PreventRequestsDuringMaintenance.php\",\n            \"line\": 86,\n            \"function\": \"Illuminate\\\\Pipeline\\\\{closure}\",\n            \"class\": \"Illuminate\\\\Pipeline\\\\Pipeline\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Pipeline\\\\Pipeline.php\",\n            \"line\": 180,\n            \"function\": \"handle\",\n            \"class\": \"Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\PreventRequestsDuringMaintenance\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Http\\\\Middleware\\\\HandleCors.php\",\n            \"line\": 49,\n            \"function\": \"Illuminate\\\\Pipeline\\\\{closure}\",\n            \"class\": \"Illuminate\\\\Pipeline\\\\Pipeline\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Pipeline\\\\Pipeline.php\",\n            \"line\": 180,\n            \"function\": \"handle\",\n            \"class\": \"Illuminate\\\\Http\\\\Middleware\\\\HandleCors\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Http\\\\Middleware\\\\TrustProxies.php\",\n            \"line\": 39,\n            \"function\": \"Illuminate\\\\Pipeline\\\\{closure}\",\n            \"class\": \"Illuminate\\\\Pipeline\\\\Pipeline\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Pipeline\\\\Pipeline.php\",\n            \"line\": 180,\n            \"function\": \"handle\",\n            \"class\": \"Illuminate\\\\Http\\\\Middleware\\\\TrustProxies\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Pipeline\\\\Pipeline.php\",\n            \"line\": 116,\n            \"function\": \"Illuminate\\\\Pipeline\\\\{closure}\",\n            \"class\": \"Illuminate\\\\Pipeline\\\\Pipeline\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Foundation\\\\Http\\\\Kernel.php\",\n            \"line\": 175,\n            \"function\": \"then\",\n            \"class\": \"Illuminate\\\\Pipeline\\\\Pipeline\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Foundation\\\\Http\\\\Kernel.php\",\n            \"line\": 144,\n            \"function\": \"sendRequestThroughRouter\",\n            \"class\": \"Illuminate\\\\Foundation\\\\Http\\\\Kernel\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\public\\\\index.php\",\n            \"line\": 52,\n            \"function\": \"handle\",\n            \"class\": \"Illuminate\\\\Foundation\\\\Http\\\\Kernel\",\n            \"type\": \"->\"\n        },\n        {\n            \"file\": \"C:\\\\xampp\\\\htdocs\\\\Libra\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Foundation\\\\resources\\\\server.php\",\n            \"line\": 16,\n            \"function\": \"require_once\"\n        }\n    ]\n}"
