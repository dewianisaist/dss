@extends('layouts.index')

@section('content')
<!-- Top content -->
<div class="top-content">
    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1 class="wow fadeInLeftBig"><strong>Sistem Seleksi Peserta Pelatihan<br/>BLK Bantul</strong></h1>
                    <div class="description wow fadeInLeftBig">
                        <p>
	                        Pendaftaran Pelatihan BLK Bantul telah dibuka. Anda ingin bergabung?
                    	</p>
                    </div>
                    <div class="top-big-link wow fadeInUp">
                        <a class="btn btn-link-1" href="/register" target="_blank">Register</a>
                    	<a class="btn btn-link-2 scroll-link" href="#features">Lihat Program</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        
<!-- PROGRAM -->
<div class="features-container section-container">
	<div class="container">
	    <div class="row">
            <div class="col-sm-12 features section-description wow fadeIn">
	            <h2><strong>PROGRAM</strong> PELATIHAN YANG DIBUKA</h2>
	            <div class="divider-1 wow fadeInUp"><span></span></div>
            </div>
	    </div>
        <div class="row">
			<div class="col-sm-12">
				<div class="great-support-box-text great-support-box-text-left">
					@foreach($available as $key => $buka)
						<h4>{{ ++$i }}. {{ $buka->name }}</h4>
						<ul>
							<li>Tanggal akhir pendaftaran: {{ $buka->final_registration_date }}</li>
							<li>Kuota: {{ $buka->quota }}</li>
							<li>Lama pelatihan: {{ $buka->long_training }} jam</li>
						</ul> 
					@endforeach
				</div>
            </div>
        </div>
	</div>
</div>

<!-- PROGRAM PELATIHAN -->
<div class="how-it-works-container section-container section-container-image-bg">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 how-it-works section-description wow fadeIn">
				<h2><strong>Program</strong> Pelatihan</h2>
				<div class="divider-1 wow fadeInUp"><span></span></div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="great-support-box-text great-support-box-text-left">
					<h4>Berikut ini sub-kejuruan yang ada di BLK Bantul:</h4>
					@foreach($data as $key => $subvocational)
						<ul>
							<li>{{ $subvocational->name }} ({{ $subvocational->vocational->name }})</li> 
						</ul> 
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

<!-- GALERI -->
<div class="kejuruan-container section-container section-container-gray-bg">
	<div class="container">
	    <div class="row">
	        <div class="col-sm-12 testimonials section-description wow fadeIn">
	            <h2><strong>Galeri</strong> Program Pelatihan</h2>
	            <div class="divider-1 wow fadeInUp"><span></span></div>
            </div>
	    </div>
        <div class="row">
	        <div class="col-sm-10 col-sm-offset-1 testimonial-list wow fadeInUp">
	        	<div role="tabpanel">
	                <!-- Tab panes -->
	        		<div class="tab-content">
	        			<div role="tabpanel" class="tab-pane fade in active" id="tab1">
	                		<div class="testimonial-image">
	                			<img src="blk/menjahit.jpg" alt="" data-at2x="blk/menjahit.jpg">
	        				</div>
	                		<div class="testimonial-text">
		                        <p>
										PRAKTIK SISWA SUB KEJURUAN <strong>MENJAHIT</strong>
		                        </p>
	                        </div>
	        			</div>
	                	<div role="tabpanel" class="tab-pane fade" id="tab2">
	            			<div class="testimonial-image">
	                			<img src="blk/pertanian.jpg" alt="" data-at2x="blk/pertanian.jpg">
	                		</div>
	            			<div class="testimonial-text">
		                        <p>
		                            PRAKTIK SISWA SUB KEJURUAN PENGOLAHAN <strong>HASIL PERTANIAN</strong>
	                            </p>
	                        </div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tab3">
								<div class="testimonial-image">
									<img src="blk/officetools.jpg" alt="" data-at2x="blk/officetools.jpg">
								</div>
								<div class="testimonial-text">
									<p>
										PRAKTIK SISWA SUB KEJURUAN <strong><dfn>OFFICE TOOLS</dfn></strong>
									</p>
								</div>
							</div>
	        			<div role="tabpanel" class="tab-pane fade" id="tab4">
	        				<div class="testimonial-image">
	                			<img src="blk/batik.jpg" alt="" data-at2x="blk/batik.jpg">
	                		</div>
	            			<div class="testimonial-text">
		                        <p>
									PRAKTIK SISWA SUB KEJURUAN <strong>BATIK</strong>
		                        </p>
	                        </div>
						</div>
	            		<div role="tabpanel" class="tab-pane fade" id="tab5">
	        				<div class="testimonial-image">
            					<img src="blk/kecantikan.jpg" alt="" data-at2x="blk/kecantikan.jpg">
	                		</div>
	                		<div class="testimonial-text">
		                        <p>
									PRAKTIK SISWA SUB KEJURUAN <strong>KECANTIKAN</strong>
		                        </p>
	                        </div>
                		</div>
	            	</div>
	                <!-- Nav tabs -->
	                <ul class="nav nav-tabs" role="tablist">
	        			<li role="presentation" class="active">
	        				<a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab"></a>
	                	</li>
	            		<li role="presentation">
	                		<a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab"></a>
	                	</li>
	        			<li role="presentation">
	                		<a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab"></a>
	                	</li>
	        			<li role="presentation">
	        				<a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab"></a>
						</li>
						<li role="presentation">
							<a href="#tab5" aria-controls="tab5" role="tab" data-toggle="tab"></a>
						</li>
	            	</ul>
	        	</div>
            </div>
	    </div>
    </div>
</div>

<!-- ALUR -->
<div class="alur-container section-container">
	<div class="container">
	    <div class="row">
            <div class="col-sm-12 more-features section-description wow fadeIn">
	            <h2><strong>ALUR</strong> PENDAFTARAN</h2>
	            <div class="divider-1 wow fadeInUp"><span></span></div>
            </div>
	    </div>
        <div class="row">
	        <div class="col-sm-6 more-features-box wow fadeInLeft">
				<div class="more-features-box-text">
	                <div class="more-features-box-text-icon">
	            		1
	            	</div>
	                <h3>Register</h3>
	            	<div class="more-features-box-text-description">
	            		Jika belum mempunyai akun, pendaftar registrasi melalui website seleksi peserta pelatihan BLK Bantul.
	                </div>
	            </div>
				<div class="more-features-box-text">
	                <div class="more-features-box-text-icon">
	            		2
	            	</div>
	                <h3>Login</h3>
	            	<div class="more-features-box-text-description">
	                    Jika sudah mempunyai akun, pendaftar login dengan NIK (Nomor Induk Kependudukan) sesuai yang sudah diisikan saat registrasi.
	            	</div>
	            </div>
				<div class="more-features-box-text">
	                <div class="more-features-box-text-icon">
	            		3
	            	</div>
	                <h3>Melengkapi Profil</h3>
	            	<div class="more-features-box-text-description">
	            		Setelah berhasil login, pendaftar melengkapi profil yang terdiri dari Data Diri, Riwayat Pendidikan, dan Pengalaman Kursus.
	                </div>
	            </div>
				<div class="more-features-box-text">
	                <div class="more-features-box-text-icon">
	            		4
	            	</div>
                    <h3>Mendaftar Program Pelatihan</h3>
	            	<div class="more-features-box-text-description">
	            		Pendaftar mendaftar seleksi dengan memilih program pelatihan yang akan diikuti.
                	</div>
	            </div>
	        </div>
            <div class="col-sm-6 more-features-box wow fadeInUp">
				<div class="more-features-box-text">
	            	<div class="more-features-box-text-icon">
	                    5
	            	</div>
	            	<h3>Pengumuman Jadwal Tes Tertulis dan Wawancara</h3>
                	<div class="more-features-box-text-description">
	                    Pengumuman jadwal tes tertulis dan wawancara dapat dilihat di website seleksi peserta pelatihan. 
	            	</div>
	            </div>
				<div class="more-features-box-text">
	                <div class="more-features-box-text-icon">
	            		6
	            	</div>
	                <h3>Melakukan Tes Tertulis dan Wawancara</h3>
	            	<div class="more-features-box-text-description">
	            		Pendaftar melakukan tes tertulis dan wawancara secara langsung di BLK Bantul sesuai 
						dengan jadwal yang sudah ditentukan.
	            	</div>
	            </div>
				<div class="more-features-box-text">
	                <div class="more-features-box-text-icon">
	            		7
	            	</div>
	                <h3>Pengumuman Hasil Seleksi</h3>
	            	<div class="more-features-box-text-description">
	            		Setelah dilakukan penilaian, hasil seleksi diumumkan di website seleksi peserta pelatihan secara transparan.
                	</div>
	            </div>
	        </div>
	    </div>
		<div class="row">
	        <div class="col-sm-12 section-bottom-button wow fadeInUp">
				<a class="btn btn-link-1" href="/register" target="_blank">Daftar Sekarang</a>
            </div>
	    </div>
    </div>
</div>
        
<!-- TENTANG -->
<div class="tentang-container section-container section-container-gray-bg">
	<div class="container">
	    <div class="row">
            <div class="col-sm-12 great-support section-description wow fadeIn">
	            <h2><strong>Tentang</strong> BLK Bantul</h2>
	            <div class="divider-1 wow fadeInUp"><span></span></div>
            </div>
	    </div>
        <div class="row">
	        <div class="col-sm-7 great-support-box wow fadeInLeft">
	            <div class="great-support-box-text great-support-box-text-left">
	                <h3>Sejarah Singkat BLK Bantul</h3>
	            	<p class="medium-paragraph">
	            		BLK Bantul berdasarkan Keputusan Menteri Tenaga Kerja RI Nomor: KEP.181/ MEN/1984 tanggal 26 Juli 1984 
						KLK adalah Unit Pelaksana Teknis di Bidang latihan kejuruan <span class="colored-text">Industri, Pertanian, Tata Niaga 
						dan Aneka Kejuruan</span> yang berada di bawah dan tanggung jawab kepada kepala Kantor Wilayah Departemen Daerah Istimewa Yogyakarta.
					</p>
	            </div>
	        </div>
	        <div class="col-sm-5 great-support-box wow fadeInUp">
	            <img src="/blk/blkbantul.jpg" alt="/blk/blkbantul.jpg">
	        </div>
			<div class="col-sm-12">
				<div class="great-support-box-text great-support-box-text-left">
					<p class="medium-paragraph">
						Tujuan dimaksud BLK/KLK adalah sebagai tempat pelatihan keterampilan tenaga kerja bidang industri 
						usaha kecil dan menengah serta tempat OJT dan praktek kerja sekolah-sekolah STM maupun SMA dan
						pada tanggal 24 Oktober 1984 di resmikan oleh Bp. Menteri Tenaga Kerja RI (Bp. Sudomo) tahun 1996 
						KLK diubah menjadi LLK-UKM (Loka Latihan Kerja Usaha Kecil dan Menengah) 
						Sejak Otonomi daerah tahun 2000 BLK Bantul diserahkan kepada Pemerintah Daerah Kabupaten Bantul. 
						Sebagai Unit Pelaksana Dinas Tenaga Kerja dan Transmigrasi Kabupaten Bantul Nomor: 46 Tahun 2000 
						tentang pembentukan dan organisasi Dinas Tenaga Kerja dan Transmigrasi Bantul. 
						Dan Tahun 2006 UPTD BLK Bantul Nomor: 5 tahun 2006 tentang Retribusi Pemanfaatan Fasilitas Latihan Kerja Pada BLK Bantul. 
					</p>
				</div>
	        </div>
	    </div>
    </div>
</div>
        
<!-- VISI DAN MISI -->
<div class="how-it-works-container section-container section-container-image-bg">
	<div class="container">
	    <div class="row">
            <div class="col-sm-12 how-it-works section-description wow fadeIn">
	            <h2><strong>Visi dan Misi</strong></h2>
	            <div class="divider-1 wow fadeInUp"><span></span></div>
            </div>
	    </div>
        <div class="row">
			<div class="col-sm-12">
				<div class="great-support-box-text great-support-box-text-left">
					<h3>Visi</h3>
					<p class="medium-paragraph">
						Menjadikan UPT Balai Latihan Kerja Kabupaten Bantul sebagai Lembaga pelatihan kerja yang mempersiapkan 
						tenaga kerja profesional dalam berkerja atau berusaha mandiri 
					</p>
					<h3>Misi</h3>
					<p class="medium-paragraph">
						<ul>
							<li>Meningkaatkan Kualitas tenaga kerja yang profesional melalui pelatihan berbasis kompetensi.</li> 
							<li>Mengoptimalkan pendayagunaan fasilitas pelatihan.</li>
							<li>Meningkatkan Relevansi pelatihan terhadap pasar kerja.</li>
							<li>Meningkatkan Kualitas SDM Melalui Seminar/Bintek/Diklat/Kerjasama Pihak 3.</li>
						</ul> 
					</p>
				</div>
			</div>
		</div>
    </div>
</div>
        
<!-- FUNGSI, TUJUAN, DAN SASARAN -->
<div class="fungsi-tujuan-sasaran-container section-container section-container-gray-bg">
	<div class="container">
        <div class="row">
	        <div class="col-sm-12 call-to-action section-description wow fadeInLeftBig">
	            <h2><strong>Fungsi, Tujuan, dan Sasaran</strong></h2>
                <div class="divider-1 wow fadeInUp"><span></span></div>
	        </div>
        </div>
	    <div class="row">
			<div class="col-sm-12">
				<div class="great-support-box-text great-support-box-text-left">
					<h3>Kedudukan dan Fungsi</h3>
					<p class="medium-paragraph">
						Balai Latihan Kerja adalah Unit Pelaksana Teknis di bidang pelatihan tenaga kerja, 
						bidang industri Usaha Kecil dan Menengah yang berada dibawah dan bertanggung jawab 
						kepada Dinas Tenaga Kerja dan Transmigrasi Kabupaten Bantul  
					</p>
					<h3>Tujuan</h3>
					<p class="medium-paragraph">
						<ul>
							<li>Menjadikan UPTD BLK Bantul sebagai Pusat Pemberdayaan di bidang Pelatihan kerja Industri, Usaha kecil dan menengah.</li> 
							<li>Meningkatkan kualitas dan produktivitas Instruktur dan Tenaga Kepelatihan.</li>
							<li>Meningkatkan jejaring kerjasama dan konsultasi dengan lembaga Pelatihan yang lain.</li>
							<li>Meningkatkan jejaring kerjasama dan konsultasi dengan perusahaan dalam rangka penyerapan lulusan.</li>
							<li>Melaksanakan Uji Kompetensi Setelah memiliki Tempat Uji Kompetensi (TUK) </li>
						</ul> 
					</p>
					<h3>Sasaran</h3>
					<p class="medium-paragraph">
						<ul>
							<li>Tersedianya Sumber Daya Manusia yang berkualitas dan profesional.</li> 
							<li>Terwujudnya jejaring kerjasama dengan Lembaga Pelatihan dan Industri baik sektoral maupun regional.</li>
							<li>Terlaksananya pelatihan yang sesuai dengan kebutuhan industri dan usaha.</li>
						</ul> 
					</p>
				</div>
			</div>
		</div>
    </div>
</div>
        
<!-- SARANA DAN PRASARANA -->
<div class="how-it-works-container section-container section-container-image-bg">
	<div class="container">
	    <div class="row">
	        <div class="col-sm-12 about-us section-description wow fadeIn">
	            <h2><strong>Sarana dan Prasarana</strong></h2>
	            <div class="divider-1 wow fadeInUp"><span></span></div>
	        </div>
	    </div>
	    <div class="row">
	        <div class="col-sm-12">
				<div class="great-support-box-text great-support-box-text-left">
					<p class="medium-paragraph">
						<ul>
							<li>Luas Lahan 2 Ha</li>
							<li>Kantor dan Aula</li> 
							<li>Ruang Teori/Bengkel/workshop/Lab (Institusional)</li>
							<li>Mobil Angkutan Alat dan Bahan Latihan(Non Institusional)</li>
							<li>Peralatan Praktek Kerja</li>
							<li>Mushola</li>
							<li>Rumah Dinas</li>
							<li>Lahan Pertanian</li>
							<li>Tempat Olah Raga</li>
							<li>Tempat parkir/Garasi</li>
							<li>Dll.</li> 
						</ul> 
					</p>
				</div>
			</div>
        </div>
	</div>
</div>

<!-- Hubungi -->
<div class="hubungi-container section-container">
	<div class="container">
	    <div class="row">
	        <div class="col-sm-12 about-us section-description wow fadeIn">
	            <h2><strong>Hubungi</strong> Kami</h2>
	            <div class="divider-1 wow fadeInUp"><span></span></div>
	        </div>
	    </div>
        <div class="row">
	        <div class="col-sm-6 more-features-box wow fadeInLeft">
				<div class="more-features-box-text">
					<div class="more-features-box-text-icon">
						<i class="fa fa-map-marker"></i>
					</div>
					<h4> JL. Parangtritis Km.12,5 Patalan, Jetis, Bantul, DIY 55781</h4>
				</div>
				<div class="more-features-box-text">
					<div class="more-features-box-text-icon">
						<i class="fa fa-phone"></i>
					</div>
					<h4>(0274) 367530</h4>
				</div>
			</div>
			<div class="col-sm-6 more-features-box wow fadeInLeft">
				<div class="more-features-box-text">
					<div class="more-features-box-text-icon">
						<i class="fa fa-envelope"></i>
					</div>
					<h4>disnakertrans.blkbantul@gmail.com</h4>
				</div>
				<div class="more-features-box-text">
					<div class="more-features-box-text-icon">
						<i class="fa fa-facebook"></i>
					</div>
					<h4>BLK Bantul</h4>
				</div>
			</div>   
	    </div>
    </div>
</div>