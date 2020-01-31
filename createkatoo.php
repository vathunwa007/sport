<?php $navbar = array("", "","active","",""); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>สร้างกระทู้</title>

    <?php include "head.php"; ?>

    <script>
        tinymce.init({
            selector: 'textarea#detailkatoo',
            height: 500,
            schema: 'html5',
            entity_encoding : "numeric",
            entities : '160,nbsp,162,cent,8364,euro,163,pound',
            apply_source_formatting : true,

            plugins: 'table advtable image',
            protect: [
    /\<\/?(if|endif)\>/g,  // Protect <if> & </endif>
    /\<xsl\:[^>]+\>/g,  // Protect <xsl:...>
    /<\?php.*?\?>/g  // Protect php code
  ],

            encoding : "้html",
            codesample_languages: [{
                    text: 'HTML/XML',
                    value: 'markup'
                },
                {
                    text: 'JavaScript',
                    value: 'javascript'
                },
                {
                    text: 'CSS',
                    value: 'css'
                },
                {
                    text: 'PHP',
                    value: 'php'
                },
                {
                    text: 'Ruby',
                    value: 'ruby'
                },
                {
                    text: 'Python',
                    value: 'python'
                },
                {
                    text: 'Java',
                    value: 'java'
                },
                {
                    text: 'C',
                    value: 'c'
                },
                {
                    text: 'C#',
                    value: 'csharp'
                },
                {
                    text: 'C++',
                    value: 'cpp'
                }
            ],
            toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ',

  image_list: [
    {title: 'My image 1', value: 'https://www.example.com/my1.gif'},
    {title: 'My image 2', value: 'http://www.moxiecode.com/my2.gif'}
  ],
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tiny.cloud/css/codepen.min.css'
            ]
        });
    </script>
<script>
     $(function($) {
        var ed = tinyMCE.get('detailkatoo');

        $("#sentkatoo").click(function() {
            $.ajax({
                type: "POST",
                async: true,
                url: "function/insertkatoo.php",
                data: $("#katoo").serialize()+ escape(ed.getContent()),
                success: function(result4) {
                    if (result4.status == 1) // Success
                    {
                        alert("เพิ่มกระทู้สำเร็จแล้ว");
                        window.location.href = "katoo.php?id="+result4.id;
                    } else // Err
                    {
                        swal({
                            title: "สร้างกระทู้ไม่สำเร็จ!",
                            text: result4.message,
                            icon: "error",
                        });
                    }
                }

            });

        });

    });

</script>
    <style>
        .tox .tox-statusbar a,
        .tox .tox-statusbar__path-item,
        .tox .tox-statusbar__wordcount {
            color: rgba(34, 47, 62, .7);
            text-decoration: none;
            display: none;
        }
    </style>
</head>
<body>

<?php include "navbar.php"; ?>
<div class="container">
<div class="card text-center" style="margin-top: 25px;">
  <div class="card-header">
    ตั้งหัวข้อกระทู้
  </div>
  <div class="card-body">
  <form action="" id="katoo"name="katoo" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">ชื่อหัวข้อกระทู้</label>
    <input type="text" class="form-control" name="titlekatoo"id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">กรุณาตั้งชื่อหัวข้อโดยไม่ใช้คำหยาบคาย.</small>
  </div>
  <div class="form-group">
  <textarea id="detailkatoo" name="detailkatoo"></textarea>
  </div>
  <button type"button" id="sentkatoo"class="btn btn-primary btn-lg">โพสกระทู้</button>
  </div>
  </form>


</div>
</div>


<?php include "footer.php";?>

</body>
</html>
