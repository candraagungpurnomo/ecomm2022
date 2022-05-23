<!DOCTYPE html>

<html lang="en">

	<head>

    <?php $this->load->view('user/_partials/head') ?>

	</head>

	<body>

		<?php $this->load->view('user/_partials/navbar') ?>

		

		<div class="container my-5"  style="min-height: 80vh">

            <div class="row mb-3">

                <div class="col-md-5">

                    <div class="img-container  border">

                        <img src="<?= base_url().'assets/images/'.$productsDetail->gambar;?>" alt="">

                    </div>

                </div>

                <div class="col-md-7 pl-5">

                    <h1><?= $productsDetail->nm_barang;?></h1>

                    <hr>

                    <div class="row">

                        <div class="col-3 text-muted"><h5>Harga</h5></div>

                        <div class="col-9"><h3><?='Rp. '.number_format($productsDetail->harga)?></h3></div>

                    </div>

                    <hr>

                    <div class="row">

                        <div class="col-3 text-muted"><h5>Jumlah Barang</h5></div>

                        <div class="col-9">

                            <?php

                                $stok = ($productsDetail->stok)-($productsDetail->stok_min);

                            ?>

                            <small>Stok tersisa : <?php if($stok>=0){echo $stok;}else{ echo "0";} echo " ".$productsDetail->satuan;?></small><br><br>

                            <form action="<?php echo site_url('produk/add_to_cart/'.$productsDetail->kd_barang) ?>" method="post">

                                <span class="m-2">

                                    <button class="btn btn-minus btn-counter text-center custom-button" type="button"><i class="fas fa-minus"></i></button>

                                    <input type="text" name="qty" class="col-2 btn border px-2 count" value="1" onkeypress="return onlyNumberKey(event)">

                                    <button class="btn btn-plus btn-counter text-center custom-button" type="button"><i class="fas fa-plus"></i></button>

                                </span>

                                <span class="hargaX"></span>

                                <button id="addtocart" type="submit" class="btn btn-beli m-2"><i class="fas fa-plus"></i>&nbsp;Add to Cart</button>

                                <?php if ($this->session->flashdata('success')): ?>

                                    <div class="alert alert-success" role="alert">

                                        <?php echo $this->session->flashdata('success'); ?>

                                    </div>

                                <?php endif; ?>

                            </form>

                        </div>

                    </div>

                    <hr>

                    <div class="row" id="smoth-up">

                        <div class="col-3 text-muted"><h5>Deskripsi</h5></div>

                        <div class="col-9"><h6>

                            <?= $productsDetail->deskripsi ?>

                        </h6></div>

                    </div>

                </div>

            </div>

            <!-- Tampilkan Produk Terlaris -->
            <div class="mt-5 mb-2 border-bottom border-5 border-success mb-0"><h5>Produk Terlaris</h5></div>
            <div class="row"><div class="col-8"><hr class="btn-beli mt-0"></div><div class="col-4"></div></div>
            <div class="row p-0 ">
                <?php foreach ($best_products as $row2) : ?>
                    <div class="col-lg-2 col-md-3 col-6 my-2 px-2">
                        <btn class="card card-block card_produk shadow-sm d-flex h-100" onclick="window.location.href='<?= site_url('produk/detail/'.$row2->kd_barang)?>'">
                            <img class="card-img-top" height="150px" src="<?php echo base_url().'assets/images/'.$row2->gambar; ?> " alt=" <?=$row2->nm_barang; ?>">
                            <div class="card-body px-2  d-flex flex-column py-2">
                                <h6 class="card-title mb-2"> <?= $row2->nm_barang; ?> </h6>
                                <div class="card-text mt-auto">
                                    <div class="text-description">
                                    <?= (strlen($row2->deskripsi) > 50 ?
                                        substr($row2->deskripsi,0,50)."..." :
                                        $row2->deskripsi);
                                    ?>
                                    </div>
                                    <div class="text-right mt-2 harga">
                                        <kbd><?= 'Rp. '.number_format($row2->harga); ?></kbd>
                                    </div>
                                </div>
                            </div>
                        </btn>
                    </div>
                <?php endforeach; ?>

            </div>
            <!-- akhir produk terlaris -->

            <div class="mt-5 mb-2 border-bottom border-5 border-success mb-0"><h5>Barang yang mungkin anda suka</h5></div>
            <div class="row"><div class="col-8"><hr class="btn-beli mt-0"></div><div class="col-4"></div></div>
            <!-- Tampilkan semua produk -->

            <div class="row p-0">

            <!-- looping products -->

            <?php foreach ($products as $row) : ?>

                <div class="col-lg-2 col-md-3 col-6 my-2 px-2 ">

                    <btn class="card card-block card_produk shadow-sm d-flex h-100" onclick="window.location.href='<?= site_url('produk/detail/'.$row->kd_barang)?>'">

                        <img class="card-img-top" height="150px" src="<?php echo base_url().'assets/images/'.$row->gambar; ?> " alt=" <?=$row->nm_barang; ?>">

                        <div class="card-body px-2  d-flex flex-column">

                            <h6 class="card-title mb-2"> <?= $row->nm_barang; ?> </h6>

                            <div class="card-text mt-auto">

                                <div class="text-description">

                                <?= (strlen($row->deskripsi) > 50 ?

                                    substr($row->deskripsi,0,50)."..." :

                                    $row->deskripsi);

                                ?>

                                </div>

                                <div class="text-right mt-2 harga">

                                    <kbd><?= 'Rp. '.number_format($row->harga); ?></kbd>

                                </div>

                            </div>

                        </div>

                        <!-- <div class="card-footer bg-white border-top-0 p-2 pt-1">

                            <div class=""><?//=anchor('produk/add_to_cart/'.$row->produk_id, 'Add to cart' , ['class'=>'btn btn-success btn-block mt-auto','role'=>'button'])?></div>

                        </div> -->

                    </btn>

                </div>

            <?php endforeach; ?>

            <!-- end looping -->

        </div>

		</div>

		<?php $this->load->view('user/_partials/footer') ?>

		<?php $this->load->view('user/_partials/js') ?>

        <script>

             //fungsi counter button

             $(document).ready(function(){



                if(parseInt("<?=$stok?>") < 1){

                    $('.count').val(0);

                    $('addtocart').setEnabled(false);

                }



                $('.hargaX').text(parseInt($('.count').val()) * parseInt("<?=$productsDetail->harga?>")).formatCurrency();

                $(document).on('click','.btn-plus',function(){

                    if(parseInt($('.count').val()) < parseInt("<?=$stok?>")){

                        $('.count').val(parseInt($('.count').val()) + 1 );

                        $('.hargaX').text(parseInt($('.count').val()) * parseInt("<?=$productsDetail->harga?>") ).formatCurrency();

                    }

                });

                $(document).on('click','.btn-minus',function(){

                    $('.count').val(parseInt($('.count').val()) - 1 );

                    if ($('.count').val() <= 0) { $('.count').val(0);};

                    $('.hargaX').text(parseInt($('.count').val()) * parseInt("<?=$productsDetail->harga?>") ).formatCurrency();



                });

            }); //fungsi counter button



            // fungsi input hanya menerima angka

            function onlyNumberKey(evt) { 

                var ASCIICode = (evt.which) ? evt.which : evt.keyCode 

                if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) return false; 

                return true; 

            }   // fungsi input hanya menerima angka 



            setTimeout(function(){

                $('.alert').fadeOut('500');

            }, 1000);

        </script>

	</body>

</html