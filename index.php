<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>Drag&amp;Drop</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="jquery-2.1.1.min.js"></script>
<script type="text/javascript">
$(function() {
  $('#dropzone').on('drop', function(event) {
    var file = event.originalEvent.dataTransfer.files[0];
    var formData = new FormData();
    formData.append('file', file);
    $.ajax('upload.php', {
      method: 'POST',
      contentType: false,
      processData: false,
      data:formData,
      error: function(xhr, error) {
        console.log('アップロード失敗');
        console.log(error);
      },
      success: function(response) {
        console.log('アップロード成功');
        console.log(response);
      }
    });
    return false;
  }).on('dragover', function(event) {
    return false;
  });
});
  </script>
</head>
<body>
  <h1>画像ファイルのアップロード</h1>
  <div id="dropzone" dropzone style="background-color: #0000FF;height: 200px;">
   ここへ画像ファイルをドロップ
  </div>
</body>
</html>