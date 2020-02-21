<?php
$navbar = array("", "", "active", "", "");
require_once "function/connect.php";
$idkatoo = $_REQUEST['id'];
if($idkatoo == null){
    echo "<script>window.location = 'home2.php';</script>";
}
$sql = "SELECT * FROM `tb_katoo` WHERE id = $idkatoo";
$query = mysqli_query($con, $sql) or die(mysqli_error($con));
$row_showkatoo = mysqli_fetch_array($query);
$total_row = mysqli_num_rows($query);

$sqlcomment = "SELECT *FROM tb_commentkatoo a
INNER JOIN tb_member b
ON a.idmember = b.m_id WHERE idkatoo = $idkatoo";
$querycomment = mysqli_query($con, $sqlcomment) or die(mysqli_error($con));
$row_comment = mysqli_fetch_array($querycomment);
$total_comment = mysqli_num_rows($querycomment);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include "head.php"; ?>
    <style>
        #showcomment {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        #cardcomment {
            background-color: #3395ff;
        }

        #cardcomment p {
            margin-bottom: 0rem;
        }

        .card-footer {
            padding: .25rem 1.25rem;
            background-color: rgba(0, 0, 0, .03);
            border-top: 1px solid rgba(0, 0, 0, .125);
        }

        .card-footer p {
            margin-bottom: 0rem;
        }
    </style>
    <script>
        tinymce.init({
            selector: 'textarea#comment',
            height: 500,
            schema: 'html5',
            entity_encoding: "numeric",
            entities: '160,nbsp,162,cent,8364,euro,163,pound',
            apply_source_formatting: true,

            plugins: 'table advtable image',
            protect: [
                /\<\/?(if|endif)\>/g, // Protect <if> & </endif>
                /\<xsl\:[^>]+\>/g, // Protect <xsl:...>
                /<\?php.*?\?>/g // Protect php code
            ],

            encoding: "้html",
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

            image_list: [{
                    title: 'My image 1',
                    value: 'https://www.example.com/my1.gif'
                },
                {
                    title: 'My image 2',
                    value: 'http://www.moxiecode.com/my2.gif'
                }
            ],
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tiny.cloud/css/codepen.min.css'
            ]
        });
    </script>
    <script>
        $(function($) {
            var ed = tinyMCE.get('comment');

            $("#sentcomment").click(function() {
                $.ajax({
                    type: "POST",
                    async: true,
                    url: "function/commentkatoo.php",
                    data: $("#commentkatoo").serialize() + escape(ed.getContent()),
                    success: function(result4) {
                        if (result4.status == 1) // Success
                        {
                            alert("ตอบกระทู้สำเร็จ");
                            location.reload();
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
    <div class="container " style="margin-top:25px;">

        <div class="card text-center">
            <div class="card-header clearfix ">
                <h5 class="float-left"><?php echo $row_showkatoo['namekatoo']; ?></h5>

            </div>
            <div class="card-body">

                <?php echo $row_showkatoo['detailkatoo']; ?>
            </div>
            <div class="card-footer text-muted ">
                <p class="float-left" style="display:inline;">ผู้ตั้งกระทู้รหัส:<?php echo $row_showkatoo['idmember']; ?></p>
                <p class="float-right" style="display:inline;">วันที่โพส:<?php echo $row_showkatoo['datetime']; ?></p>

            </div>
        </div>

        <!-----------------------comment----------------------------------------->
        <?php if ($total_comment != 0) {
            $i = 0;
            do {  $i++;?>
                <div id="showcomment" class="card w-100">

                    <div class="card-body ">
                    <div class="d-flex bd-highlight">
                    <p class="w-100 bd-highlight" style="font-size:13px;padding-bottom:1rem;">ความคิดเห็นที่ <?= $i ?></p>
                    <img class="flex-shrink-1 bd-highlight" src="img/<?php echo $row_comment['imageprofile']; ?>" alt="" width="50">
                    </div>

                        <?php echo $row_comment['comment']; ?>
                    </div>
                    <div class="card-footer text-muted">
                    <?php echo "ชื่อสมาชิก :", $row_comment['m_username']; ?>
                        <p class="float-right" style="display:inline;">วันที่ตอบกระทู้:<?php echo $row_comment['datetime']; ?></p>
                    </div>
                </div>
        <?php } while ($row_comment = mysqli_fetch_assoc($querycomment));
        } ?>
        <form action="" name="commentkatoo" id="commentkatoo" method="POST">
            <div class="card">
                <h5 class="card-header">ตอบกระทู้</h5>
                <div class="card-body">
                    <input hidden type="text" name="idkatoo" id="idkatoo" value="<?php echo $idkatoo; ?>">

                    <textarea id="comment" name="comment"></textarea>
                    <div class="row">
                        <div class="col-6"><button class="btn btn-info btn-lg w-100" type="button" onclick="window.history.back();">ย้อนกลับ</button></div>
                        <div class="col-6"><button class="btn btn-success btn-lg w-100" type"button" id="sentcomment">ตอบกระทู้</button></div>
                    </div>


                </div>
            </div>
        </form>


    </div>

    <!--<script src = "https://cdn.tiny.cloud/1/w22fesakkdz0snzdmlhx3l7rghzai4755s282iw70fhxmqn8/tinymce/5/tinymce/5min.js"> </script> -->

    <?php include "footer.php"; ?>
</body>

</html>