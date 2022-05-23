<!DOCTYPE html>

<html lang="en">

	<head>

    <?php $this->load->view('user/_partials/head') ?>

	</head>

	<body>

		<?php $this->load->view('user/_partials/navbar') ?>

		

		<div class="container my-5 height-100" style="min-height: 80vh">

                <?php if (isset($keyword_search)){ ?>

                    <div class="alert alert-success" role="alert">

                        <?= "Menampilkan hasil pencarian untuk keyword :  <b>".$keyword_search."</b>" ?>

                    </div>

                <?php }else if(!isset($keyword_search)){ ?>



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

                        <?php } ?>

            <!-- Tampilkan Semua Produk -->
            <div class="mt-5 mb-2 border-bottom border-5 border-success mb-0"><h5>Semua Produk</h5></div>
            <div class="row"><div class="col-8"><hr class="btn-beli mt-0"></div><div class="col-4"></div></div>
            <div class="row p-0 ">
            <!-- looping products -->
            <?php foreach ($products as $row) : ?>

                <div class="col-lg-2 col-md-3 col-6 my-2 px-2">

                    <btn class="card card-block card_produk shadow-sm d-flex h-100" onclick="window.location.href='<?= site_url('produk/detail/'.$row->kd_barang)?>'">

                        <img class="card-img-top" height="150px" src="<?php echo base_url().'assets/images/'.$row->gambar; ?> " alt=" <?=$row->nm_barang; ?>">

                        <div class="card-body px-2  d-flex flex-column py-2">

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

	</body>

</html

