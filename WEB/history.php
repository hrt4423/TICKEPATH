<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    </title>
</head>
<body>
<div class="card_position"><!--カード位置調整-->
            <div class="card">
                <div class="card-body">
                    <div class="row gx-0">
                        <div class="col-3" >
                            <?php 
                                $daoPerformance->outPutDate($aimyon);
                            ?>
                        </div>

                        <div class="col-1">
                            <div id="vertical_line">
                                <!-- 縦線-->
                            </div>
                        </div>

                        <div class="col-8">
                            <h6 class="card-title">
                                <?php
                                    $daoPerformance->outPutArtist($aimyon);
                                ?>
                            </h6>
                            <div>
                                <?php
                                    $daoPerformance->outPutPlace($aimyon);
                                ?>
                            </div>
                            <div>
                                <?php
                                    echo '開演：';
                                    $daoPerformance->outPutStartTime($aimyon);
                                    echo '～';
                                    echo '（開場', $daoPerformance->outPutOpenTime($aimyon), '～）';
                                ?>
                            </div>
                        </div>
                    </div><!--row-->
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- カード位置調整 -->
</body>
</html>