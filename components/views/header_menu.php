<ul class="clearfix">
	<?php if($this->type == true) {?>
		<li class="responsive-lx">
			<a href="javascript:void(0);" title="<?php echo Yii::t('phrase', 'Menu');?>"><?php echo Yii::t('phrase', 'Menu');?></a>
			<?php $this->widget('HeaderMenu', array(
				'type'=>false,
			)); ?>
		</li>
	<?php }?>
	<li class="<?php echo ($this->type == true ? (($module == null && $currentAction == 'site/index') ? 'responsive-ls active' : 'responsive-ls') : '');?>"><a href="<?php echo Yii::app()->createUrl('site/index');?>" title="Home">Home</a></li>
	<li class="<?php echo ($this->type == true ? ($module == null && $currentAction == 'page/view' && in_array(Yii::app()->getRequest()->getParam('id'), array(6,5,7)) ? 'responsive-ls active' : 'responsive-ls') : '');?>"><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>6,'slug'=>$this->urlTitle(Yii::t('phrase', 'Sejarah BPAD Provinsi Daerah istimewa Yogyakarta'))))?>" title="<?php echo Yii::t('phrase', 'BPAD')?>"><?php echo Yii::t('phrase', 'BPAD')?></a>
		<ul>
			<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>6,'slug'=>$this->urlTitle(Yii::t('phrase', 'Sejarah BPAD Provinsi Daerah istimewa Yogyakarta'))))?>" title="<?php echo Yii::t('phrase', 'Sejarah BPAD Provinsi Daerah istimewa Yogyakarta');?>"><?php echo Yii::t('phrase', 'Sejarah BPAD');?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>5,'slug'=>$this->urlTitle(Yii::t('phrase', 'Visi & Misi Badan Perpustakaan dan Arsip Daerah'))))?>" title="<?php echo Yii::t('phrase', 'Visi & Misi Badan Perpustakaan dan Arsip Daerah');?>"><?php echo Yii::t('phrase', 'Visi dan Misi');?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>7,'slug'=>$this->urlTitle(Yii::t('phrase', 'Struktur Organisasi BPAD DIY'))))?>" title="<?php echo Yii::t('phrase', 'Struktur Organisasi BPAD DIY');?>"><?php echo Yii::t('phrase', 'Struktur Organisasi');?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>22,'slug'=>$this->urlTitle(Yii::t('phrase', 'Tugas Pokok dan Fungsi'))))?>" title="<?php echo Yii::t('phrase', 'Tugas Pokok dan Fungsi');?>"><?php echo Yii::t('phrase', 'TUPOKSI');?></a>
			<ul>
				<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>23,'slug'=>$this->urlTitle(Yii::t('phrase', 'TUPOKSI Sekretariat'))))?>" title="<?php echo Yii::t('phrase', 'TUPOKSI Sekretariat');?>"><?php echo Yii::t('phrase', 'Sekretariat');?></a></li>
				<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>24,'slug'=>$this->urlTitle(Yii::t('phrase', 'TUPOKSI Bidang Pengembangan Perpustakaan'))))?>" title="<?php echo Yii::t('phrase', 'TUPOKSI Bidang Pengembangan Perpustakaan');?>"><?php echo Yii::t('phrase', 'Bidang Pengembangan Perpustakaan');?></a></li>
				<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>25,'slug'=>$this->urlTitle(Yii::t('phrase', 'TUPOKSI Bidang Arsip Dinamis'))))?>" title="<?php echo Yii::t('phrase', 'TUPOKSI Bidang Arsip Dinamis');?>"><?php echo Yii::t('phrase', 'Bidang Arsip Dinamis');?></a></li>
				<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>26,'slug'=>$this->urlTitle(Yii::t('phrase', 'TUPOKSI Bidang Arsip Statis'))))?>" title="<?php echo Yii::t('phrase', 'TUPOKSI Bidang Arsip Statis');?>"><?php echo Yii::t('phrase', 'Bidang Arsip Statis');?></a></li>
			</ul>
			</li>
			<li><a href="<?php echo Yii::app()->createUrl('article/news/index', array('id'=>31,'slug'=>$this->urlTitle(Yii::t('phrase', 'Program dan Kegiatan'))))?>" title="<?php echo Yii::t('phrase', 'Program dan Kegiatan');?>"><?php echo Yii::t('phrase', 'Program dan Kegiatan');?></a></li>
		</ul>
	</li>
	<li class="<?php echo ($this->type == true ? ($module == 'article' && $controller == 'ppid' ? 'responsive-ls active' : 'responsive-ls') : '');?>"><a href="<?php echo Yii::app()->createUrl('article/ppid/index');?>" title="<?php echo Yii::t('phrase', 'PPID')?>"><?php echo Yii::t('phrase', 'PPID')?></a>
		<ul>
			<li><a href="<?php echo Yii::app()->createUrl('article/ppid/index', array('category'=>27,'slug'=>$this->urlTitle(Yii::t('phrase', 'Informasi Berkala'))));?>" title="<?php echo Yii::t('phrase', 'Informasi Berkala')?>"><?php echo Yii::t('phrase', 'Informasi Berkala')?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/ppid/index', array('category'=>28,'slug'=>$this->urlTitle(Yii::t('phrase', 'Informasi Setiap Saat'))));?>" title="<?php echo Yii::t('phrase', 'Informasi Setiap Saat')?>"><?php echo Yii::t('phrase', 'Informasi Setiap Saat')?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/ppid/index', array('category'=>29,'slug'=>$this->urlTitle(Yii::t('phrase', 'Informasi Serta Merta'))));?>" title="<?php echo Yii::t('phrase', 'Informasi Serta Merta')?>"><?php echo Yii::t('phrase', 'Informasi Serta Merta')?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/ppid/index', array('category'=>30,'slug'=>$this->urlTitle(Yii::t('phrase', 'Dokumen Informasi Publik'))));?>" title="<?php echo Yii::t('phrase', 'Dokumen Informasi Publik')?>"><?php echo Yii::t('phrase', 'Dokumen Informasi Publik')?></a></li>
		</ul>
	</li>
	<li class="<?php echo ($this->type == true ? ($module == 'article' && $controller == 'news' ? 'responsive-ls active' : 'responsive-ls') : '');?>"><a href="<?php echo Yii::app()->createUrl('article/news/index');?>" title="<?php echo Yii::t('phrase', 'Berita')?>"><?php echo Yii::t('phrase', 'Berita')?></a>
		<ul>
			<li><a href="<?php echo Yii::app()->createUrl('article/news/index', array('category'=>5,'slug'=>$this->urlTitle(Yii::t('phrase', 'Perpustakaan'))));?>" title="<?php echo Yii::t('phrase', 'Perpustakaan')?>"><?php echo Yii::t('phrase', 'Perpustakaan')?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/news/index', array('category'=>6,'slug'=>$this->urlTitle(Yii::t('phrase', 'Kearsipan'))));?>" title="<?php echo Yii::t('phrase', 'Kearsipan')?>"><?php echo Yii::t('phrase', 'Kearsipan')?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/news/index', array('category'=>2,'slug'=>$this->urlTitle(Yii::t('phrase', 'KCKR'))));?>" title="<?php echo Yii::t('phrase', 'KCKR')?>"><?php echo Yii::t('phrase', 'KCKR')?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/news/index', array('category'=>7,'slug'=>$this->urlTitle(Yii::t('phrase', 'Event'))));?>" title="<?php echo Yii::t('phrase', 'Event')?>"><?php echo Yii::t('phrase', 'Event')?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/news/index', array('category'=>18,'slug'=>$this->urlTitle(Yii::t('phrase', 'Pengumuman'))));?>" title="<?php echo Yii::t('phrase', 'Pengumuman')?>"><?php echo Yii::t('phrase', 'Pengumuman')?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/news/index', array('category'=>3,'slug'=>$this->urlTitle(Yii::t('phrase', 'Opini'))));?>" title="<?php echo Yii::t('phrase', 'Opini')?>"><?php echo Yii::t('phrase', 'Opini')?></a></li>
			<?php /*
			<li><a href="<?php echo Yii::app()->createUrl('article/news/index', array('category'=>4,'slug'=>$this->urlTitle(Yii::t('phrase', '1537'))));?>" title="<?php echo Yii::t('phrase', '1537')?>"><?php echo Yii::t('phrase', '1537')?></a></li>
			*/?>
		</ul>
	</li>
	<li class="<?php echo ($this->type == true ? (($module != null && (in_array($currentModule, array('article/library','book/review','book/request')))) || ($module == null && $controller == 'page' && (isset($_GET['id']) && in_array($_GET['id'], array(10,11)))) ? 'responsive-ls active' : 'responsive-ls') : '');?>"><a href="<?php echo Yii::app()->createUrl('article/library/index');?>" title="<?php echo Yii::t('phrase', 'Perpustakaan')?>"><?php echo Yii::t('phrase', 'Perpustakaan')?></a>
		<ul>
			<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>11,'slug'=>$this->urlTitle(Yii::t('phrase', 'Profil Balai Layanan Perpustakaan'))))?>" title="<?php echo Yii::t('phrase', 'Profil Balai Layanan Perpustakaan');?>"><?php echo Yii::t('phrase', 'Profil Balai Layanan Perpustakaan');?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>16,'slug'=>$this->urlTitle(Yii::t('phrase', 'Layanan Perpustakaan'))))?>" title="<?php echo Yii::t('phrase', 'Layanan Perpustakaan');?>"><?php echo Yii::t('phrase', 'Layanan Perpustakaan');?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>17,'slug'=>$this->urlTitle(Yii::t('phrase', 'Fasilitas Perpustakaan'))))?>" title="<?php echo Yii::t('phrase', 'Fasilitas Perpustakaan');?>"><?php echo Yii::t('phrase', 'Fasilitas Perpustakaan');?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>18,'slug'=>$this->urlTitle(Yii::t('phrase', 'Koleksi Perpustakaan'))))?>" title="<?php echo Yii::t('phrase', 'Koleksi Perpustakaan');?>"><?php echo Yii::t('phrase', 'Koleksi Perpustakaan');?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>10,'slug'=>$this->urlTitle(Yii::t('phrase', 'Keanggotaan'))))?>" title="<?php echo Yii::t('phrase', 'Keanggotaan');?>"><?php echo Yii::t('phrase', 'Keanggotaan');?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/library/index');?>" title="<?php echo Yii::t('phrase', 'Artikel Perpustakaan');?>"><?php echo Yii::t('phrase', 'Artikel');?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/regulation/index', array('category'=>13,'slug'=>$this->urlTitle(Yii::t('phrase', 'eraturan Perundangan Perpustakaan').' '.Yii::t('phrase', '1555'))));?>" title="<?php echo Yii::t('phrase', 'eraturan Perundangan Perpustakaan').' '.Yii::t('phrase', '1555');?>"><?php echo Yii::t('phrase', 'Peraturan Perundangan');?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>15,'slug'=>$this->urlTitle(Yii::t('phrase', 'Standar Pelayanan Publik'))))?>" title="<?php echo Yii::t('phrase', 'Standar Pelayanan Publik');?>"><?php echo Yii::t('phrase', 'Standar Pelayanan Publik');?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>19,'slug'=>$this->urlTitle(Yii::t('phrase', 'SOP'))))?>" title="<?php echo Yii::t('phrase', 'SOP');?>"><?php echo Yii::t('phrase', 'SOP');?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>20,'slug'=>$this->urlTitle(Yii::t('phrase', 'Statistik Layanan'))))?>" title="<?php echo Yii::t('phrase', 'Statistik Layanan');?>"><?php echo Yii::t('phrase', 'Statistik Layanan');?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>21,'slug'=>$this->urlTitle(Yii::t('phrase', 'F.A.Q.'))))?>" title="<?php echo Yii::t('phrase', 'F.A.Q.');?>"><?php echo Yii::t('phrase', 'F.A.Q.');?></a></li>
			<?php /*
			<li><a href="<?php echo Yii::app()->createUrl('book/review/index')?>" title="<?php echo Yii::t('phrase', 'Resensi Buku');?>"><?php echo Yii::t('phrase', 'Resensi Buku');?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('book/request/index')?>" title="<?php echo Yii::t('phrase', 'Usulan Buku');?>"><?php echo Yii::t('phrase', 'Usulan Buku');?></a></li>
			*/?>
		</ul>
	</li>
	<li class="<?php echo ($this->type == true ? ((($module != null && (in_array($currentModule, array('article/archive')))) || ($module == null && $controller == 'page' && (isset($_GET['id']) && $_GET['id'] == 12))) ? 'responsive-ls active' : 'responsive-ls') : '');?>"><a href="<?php echo Yii::app()->createUrl('article/archive/index');?>" title="<?php echo Yii::t('phrase', 'Kearsipan')?>"><?php echo Yii::t('phrase', 'Kearsipan')?></a>
		<ul>
			<li><a href="<?php echo Yii::app()->createUrl('article/archive/index', array('category'=>10,'slug'=>$this->urlTitle(Yii::t('phrase', 'Artikel Kearsipan'))));?>" title="<?php echo Yii::t('phrase', 'Artikel Kearsipan');?>"><?php echo Yii::t('phrase', 'Artikel');?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/regulation/index', array('category'=>14,'slug'=>$this->urlTitle(Yii::t('phrase', 'Peraturan Perundangan').' '.Yii::t('phrase', '1557'))));?>" title="<?php echo Yii::t('phrase', 'Peraturan Perundangan').' '.Yii::t('phrase', '1557');?>"><?php echo Yii::t('phrase', 'Peraturan Perundangan');?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/archive/index', array('category'=>15,'slug'=>$this->urlTitle(Yii::t('phrase', 'Standard Kearsipan'))));?>" title="<?php echo Yii::t('phrase', 'Standard Kearsipan')?>"><?php echo Yii::t('phrase', 'Standard Kearsipan')?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/archive/index', array('category'=>16,'slug'=>$this->urlTitle(Yii::t('phrase', 'Daftar Istilah'))));?>" title="<?php echo Yii::t('phrase', 'Daftar Istilah')?>"><?php echo Yii::t('phrase', 'Daftar Istilah')?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>12,'slug'=>$this->urlTitle(Yii::t('phrase', 'Informasi Layanan Kearsipan'))))?>" title="<?php echo Yii::t('phrase', 'Informasi Layanan Kearsipan');?>"><?php echo Yii::t('phrase', 'Informasi Layanan');?></a></li>
		</ul>
	</li>
	<li class="<?php echo ($this->type == true ? (($module != null && (in_array($currentModule, array('album/site','video/site','article/announcement')))) ? 'responsive-ls active' : 'responsive-ls') : '');?>"><a href="<?php echo Yii::app()->createUrl('album/site/index');?>" title="<?php echo Yii::t('phrase', 'Galeri');?>"><?php echo Yii::t('phrase', 'Galeri');?></a>
		<ul>
			<li><a href="<?php echo Yii::app()->createUrl('album/site/index', array('type'=>'photo'));?>" title="<?php echo Yii::t('phrase', 'Photo BPAD D.I. Yogyakarta');?>"><?php echo Yii::t('phrase', 'Photo');?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('video/site/index');?>" title="<?php echo Yii::t('phrase', 'Video BPAD D.I. Yogyakarta');?>"><?php echo Yii::t('phrase', 'Video');?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/newspaper/index');?>" title="<?php echo Yii::t('phrase', 'Koran Lama Online');?>"><?php echo Yii::t('phrase', 'Koran Lama Online');?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/announcement/index');?>" title="<?php echo Yii::t('phrase', 'Download');?>"><?php echo Yii::t('phrase', 'Download');?></a></li>
			<?php /*
			<li><a href="<?php echo Yii::app()->createUrl('site/analytics');?>" title="Analytics">Analytics</a></li>
			*/?>
		</ul>
	</li>
	<li class="<?php echo ($this->type == true ? 'responsive-ls' : '');?>"><a href="javascript:void(0);" title="<?php echo Yii::t('phrase', 'e-Resources');?>"><?php echo Yii::t('phrase', 'e-Resources');?></a>
		<ul>
			<li><a target="_blank" href="http://bpad.jogjaprov.go.id/ijogja" title="<?php echo Yii::t('phrase', 'iJogja');?>"><?php echo Yii::t('phrase', 'iJogja');?></a></li>
			<li><a target="_blank" href="http://bpad.jogjaprov.go.id/opac" title="<?php echo Yii::t('phrase', 'Katalog Buku BPAD D.I. Yogyakarta');?>"><?php echo Yii::t('phrase', 'OPAC');?></a></li>
			<?php /*
			<li><a target="_blank" href="http://bpad.jogjaprov.go.id/sso" title="<?php echo Yii::t('phrase', 'Single Sign-On Grhatama Pustaka');?>"><?php echo Yii::t('phrase', 'Single Sign-On');?></a></li>
			*/?>
			<li><a target="_blank" href="http://simpul.jikn.go.id/Default.aspx?sid=igcDGoRx3MNphIxTGMb88w==" title="<?php echo Yii::t('phrase', 'JIKN BPAD D.I. Yogyakarta');?>"><?php echo Yii::t('phrase', 'JIKN BPAD DIY');?></a></li>
			<?php /*
			<li><a href="<?php echo Yii::app()->createUrl('article/journal/form');?>" title="<?php echo Yii::t('phrase', 'Form Request Journal');?>"><?php echo Yii::t('phrase', 'Form Request Journal');?></a></li>
			*/?>
		</ul>
	</li>
	<?php if($this->type == true) {?>
		<li class="search"><a href="javascript:void(0);" title="<?php echo Yii::t('phrase', 'Search');?>"><?php echo Yii::t('phrase', 'Search');?></a></li>
	<?php }?>
</ul>