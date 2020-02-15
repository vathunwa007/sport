<?php
$navbar = array("", "active", "", "", "");
require_once "function/connect.php";
$postid = $_REQUEST['id'];
$sql = "SELECT * FROM tb_addcoach a INNER JOIN tb_member b
ON a.idmember = b.m_id WHERE id = '$postid' ";
$query = mysqli_query($con, $sql) or die(mysqli_error($con));
$showpost = mysqli_fetch_array($query);
$total = mysqli_num_rows($query);

$imagequery = mysqli_query($con, "SELECT * FROM `tb-postimage` WHERE idaddcoach = '$postid'") or die(mysqli_error($con));
$showimage = mysqli_fetch_array($imagequery);
$totalimage = mysqli_num_rows($imagequery);
$imagequery2 = mysqli_query($con, "SELECT * FROM `tb-postimage` WHERE idaddcoach = '$postid'") or die(mysqli_error($con));
$showimage2 = mysqli_fetch_array($imagequery2);
$totalimage2 = mysqli_num_rows($imagequery2);

$sqlcomment = "SELECT *FROM tb_commentaddcoach a
INNER JOIN tb_member b
ON a.idmember = b.m_id WHERE idaddcoach = $postid";
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
        function showalert(i,msg){
            swal({
                            title: msg,
                            text: result.message,
                            icon: i,
                        });
        }
        tinymce.init({
            selector: 'textarea#comment',
            height: 300,
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
                async: false,
                url: "function/commentpost.php",
                data: $("#commentpost").serialize()+ escape(ed.getContent()),
                success: function(result4) {
                    if (result4.status == 1) // Success
                    {

                        alert("แสดงความคิดเห็นสำเร็จแล้ว");
                        location.reload();
                    } else // Err
                    {
                        swal({
                            title: "การแสดงความคิดเห็นผิดพลาด!",
                            text: result4.message,
                            icon: "error",
                        });
                    }
                }

            });

        });

    });

</script>
</head>

<body>
    <?php include "navbar.php"; ?>

    <div class="container">
        <div style="box-shadow: 0 20px 30px 0 rgba(0, 0, 0, 0.3), 0 20px 30px 0 rgba(0, 0, 0, 0.19);">
            <div class="card" style="margin-top:20px;">
                <div class="card-header">
                    ข้อมูลรายละเอียด
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <?php $i = 0;
                                    do { ?>
                                        <img data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="active d-block w-25" src="img/<?php echo $showimage['image']; ?>" alt="First slide">

                                    <?php $i++;
                                    } while ($showimage = mysqli_fetch_assoc($imagequery)); ?>

                                </ol>
                                <div class="carousel-inner">


                                    <?php $i = 0;
                                    do { ?>
                                        <div class="carousel-item" id="imgid<?php echo $i; ?>">
                                            <img class="d-block w-100" src="img/<?php echo $showimage2['image']; ?>" height="500" style="object-fit: cover;">
                                        </div>

                                    <?php $i++;
                                    } while ($showimage2 = mysqli_fetch_assoc($imagequery2)); ?>


                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mt-2">
                            <p class="lead">ชื่อผู้สอน : <?php echo $showpost['m_name']; ?></p>
                            <p class="lead">กีฬาที่สอน : <?php echo $showpost['namesport']; ?></p>
                            <p class="lead">รายละเอียดการสอน : <?php echo $showpost['detail']; ?></p>
                            <p class="lead">ผลงาน : <?php echo $showpost['works']; ?></p>
                            <p class="lead">สถาณที่เปิดสอน : <?php echo $showpost['location']; ?></p>
                            <p class="lead">เบอร์โทรศัพท์ : <?php echo $showpost['telephone']; ?></p>
                            <p class="lead">อีเมล์ : <?php echo $showpost['email']; ?></p>


                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted clearfix">
                    <p class="float-right">ชื่อผู้ประกาศ :<?php echo $showpost['m_username']; ?></p>
                </div>
            </div>
        </div>
        <?php if ($total_comment != 0) {
                $i=0;
                do { $i++ ?>
                    <div id="showcomment" class="card w-100 mt-5">

                        <div class="card-body">
                        <div class="d-flex bd-highlight">
                    <p class="w-100 bd-highlight" style="font-size:13px;padding-bottom:1rem;">ความคิดเห็นที่ <?= $i ?></p>
                    <img class="flex-shrink-1 bd-highlight" src="img/<?php echo $row_comment['imageprofile']; ?>" alt="" width="50">
                    </div>
                            <?php echo $row_comment['comment']; ?>
                        </div>
                        <div class="card-footer text-muted">
                        <?php echo "ชื่อสมาชิก :", $row_comment['m_username']; ?>
                            <p class="float-right" style="display:inline;">วันที่:<?php echo $row_comment['datetime']; ?></p>
                        </div>
                    </div>
            <?php } while ($row_comment = mysqli_fetch_assoc($querycomment));
            } ?>


        <?php if(isset($_SESSION['id'])){ ?>
            <form action="" name="commentpost" id="commentpost" method="POST">
                <div class="card mt-5">
                    <h5 class="card-header">แสดงความคิดเห็น</h5>
                    <div class="card-body">
                        <input hidden type="text" name="idpost" id="idpost" value="<?php echo $postid; ?>">

                        <textarea id="comment" name="comment"></textarea>
                        <div class="row">
                            <div class="col-6"><button class="btn btn-info  w-100" type="button" onclick="window.history.back();">ย้อนกลับ</button></div>
                            <div class="col-6"><button class="btn btn-success  w-100" type"button" id="sentcomment">แสดงความคิดเห็น</button></div>
                        </div>


                    </div>
                </div>
            </form>
            <?php } ?>
    </div>

    <?php include "footer.php"; ?>

</body>

</html>
<script>
    $(document).ready(function() {

        $('#imgid0').addClass('active');
    });
</script>