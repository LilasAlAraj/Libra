<!DOCTYPE html>
<html>
<head>
  <style>
    .editor {
  width: 100%;
  height: 500px;
  position: relative;
}

#editor-textarea {
  width: 100%;
  height: 100%;
  padding: 10px;
  font-size: 16px;
  font-family: Arial, sans-serif;
}
  </style>
</head>
<body>
   <div class="editor">
    <textarea id="editor-textarea"></textarea>
  </div>
  <script>
  window.onload = function() {
  var textarea = document.getElementById("editor-textarea");

  textarea.addEventListener("input", function() {
    var content = textarea.value;
    // يمكنك تنفيذ الإجراءات الأخرى هنا بناءً على المحتوى المدخل
  });
};

  </script>
</body>
</html>
