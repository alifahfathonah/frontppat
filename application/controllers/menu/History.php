<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('m_laporan');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == 'Sudah Login') {
			$data['record']= $this->m_laporan->history()->result();
			$this->load->view('menu/history/body', $data);
		}
		else {
			redirect('login');
		}
	}

	public function detail($id){
		if ($this->session->userdata('logged_in')) {
			$data['detail'] = $this->m_laporan->detail($id)->result();
			$data['laporan'] = $this->m_laporan->list_laporan($id)->result();
			$this->load->view('menu/history/list',$data);
		}
		else {
			redirect('login');
		}
	}

	public function unduh($id){
		if ($this->session->userdata('logged_in')) {
			$data['download'] = $this->m_laporan->download($id)->result();
			$this->load->view('menu/history/download',$data);
		}
		else {
		redirect('login');
		}
	}

	public function export($id){
		if ($this->session->userdata('logged_in')) {
			$data = $this->m_laporan->download($id)->result();

			$this->load->library('excel');

			// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
			$style_col = array(
				      'font' => array('bold' => true), // Set font nya jadi bold
							'alignment' => array(
								'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
							  'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
							),
							'borders' => array(
								 'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
								 'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
								 'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
								 'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
							)
			 );

			// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
			$style_row = array(      'alignment' => array(        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
		   ),
			       'borders' => array(
							         'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
											 'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
											 'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
											 'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
							)
			);

			$this->excel->setActiveSheetIndex(0);

			$this->excel->getActiveSheet()->setTitle('Worksheet1');
			$this->excel->getActiveSheet()->setCellValue('A1', 'No');
			$this->excel->getActiveSheet()->mergeCells('A1:A2');
			$this->excel->getActiveSheet()->setCellValue('B1', 'Akta');
			$this->excel->getActiveSheet()->mergeCells('B1:C1');
			$this->excel->getActiveSheet()->setCellValue('B2', 'Nomor');
			$this->excel->getActiveSheet()->setCellValue('C2', 'Tanggal');
			$this->excel->getActiveSheet()->setCellValue('D1', 'Bentuk Perbuatan Hukum');
			$this->excel->getActiveSheet()->mergeCells('D1:D2');
			$this->excel->getActiveSheet()->setCellValue('E1', 'Nama Alamat dan NPWP');
			$this->excel->getActiveSheet()->mergeCells('E1:F1');
			$this->excel->getActiveSheet()->setCellValue('E2', 'Pihak yang mengalihkan`');
			$this->excel->getActiveSheet()->setCellValue('F2', 'Pihak yang menerima');
			$this->excel->getActiveSheet()->setCellValue('G1', 'Jenis dan Nomor Hak');
			$this->excel->getActiveSheet()->mergeCells('G1:G2');
			$this->excel->getActiveSheet()->setCellValue('H1', 'Luas');
			$this->excel->getActiveSheet()->mergeCells('H1:I1');
			$this->excel->getActiveSheet()->setCellValue('H2', 'Tanah');
			$this->excel->getActiveSheet()->setCellValue('I2', 'Bangunan');
			$this->excel->getActiveSheet()->setCellValue('J1', 'Harga Transaksi Perolehan / Pengalihan Hak');
			$this->excel->getActiveSheet()->mergeCells('J1:J2');
			$this->excel->getActiveSheet()->setCellValue('K1', 'SPPT PBB');
			$this->excel->getActiveSheet()->mergeCells('K1:L1');
			$this->excel->getActiveSheet()->setCellValue('K2', 'NOP Tahun');
			$this->excel->getActiveSheet()->setCellValue('L2', 'NJOP');
			$this->excel->getActiveSheet()->setCellValue('M1', 'SSP');
			$this->excel->getActiveSheet()->mergeCells('M1:N1');
			$this->excel->getActiveSheet()->setCellValue('M2', 'Tanggal`');
			$this->excel->getActiveSheet()->setCellValue('N2', 'Rp');
			$this->excel->getActiveSheet()->setCellValue('O1', 'SSPD BPHTP');
			$this->excel->getActiveSheet()->mergeCells('O1:P1');
			$this->excel->getActiveSheet()->setCellValue('O2', 'Tanggal`');
			$this->excel->getActiveSheet()->setCellValue('P2', 'Rp');
			$this->excel->getActiveSheet()->setCellValue('Q1', 'Keterangan');
			$this->excel->getActiveSheet()->mergeCells('Q1:Q2');

			// Apply style header yang telah kita buat tadi ke masing-masing kolom header
			$this->excel->getActiveSheet()->getStyle('A1:A2')->applyFromArray($style_col);
			$this->excel->getActiveSheet()->getStyle('B1:C1')->applyFromArray($style_col);
			$this->excel->getActiveSheet()->getStyle('B2')->applyFromArray($style_col);
			$this->excel->getActiveSheet()->getStyle('C2')->applyFromArray($style_col);
			$this->excel->getActiveSheet()->getStyle('D1:D2')->applyFromArray($style_col);
			$this->excel->getActiveSheet()->getStyle('E1:F2')->applyFromArray($style_col);
			$this->excel->getActiveSheet()->getStyle('E2')->applyFromArray($style_col);
			$this->excel->getActiveSheet()->getStyle('F2')->applyFromArray($style_col);
			$this->excel->getActiveSheet()->getStyle('G1:G2')->applyFromArray($style_col);
			$this->excel->getActiveSheet()->getStyle('H1:I1')->applyFromArray($style_col);
			$this->excel->getActiveSheet()->getStyle('H2:I2')->applyFromArray($style_col);
			$this->excel->getActiveSheet()->getStyle('J1:J2')->applyFromArray($style_col);
			$this->excel->getActiveSheet()->getStyle('K1:L1')->applyFromArray($style_col);
			$this->excel->getActiveSheet()->getStyle('K2:L2')->applyFromArray($style_col);
			$this->excel->getActiveSheet()->getStyle('M1:N1')->applyFromArray($style_col);
			$this->excel->getActiveSheet()->getStyle('M2:N2')->applyFromArray($style_col);
			$this->excel->getActiveSheet()->getStyle('O1:P1')->applyFromArray($style_col);
			$this->excel->getActiveSheet()->getStyle('O2:P2')->applyFromArray($style_col);
			$this->excel->getActiveSheet()->getStyle('O1:Q2')->applyFromArray($style_col);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$this->excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_row);
			$this->excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_row);
			$this->excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_row);
			$this->excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_row);
			$this->excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_row);
			$this->excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_row);
			$this->excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_row);
			$this->excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_row);
			$this->excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_row);
			$this->excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_row);
			$this->excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_row);
			$this->excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_row);
			$this->excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_row);
			$this->excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_row);
			$this->excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_row);
			$this->excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_row);
			$this->excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_row);

			// set widt kolom
			$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
			$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
			$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
			$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
			$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
			$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
			$this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
			$this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(40);
			$this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
			$this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
			$this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
			$this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(15);
			$this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(15);
			$this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(15);
			$this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);

			$no = 1;
			$numrow = 3;
			foreach ($data as $a) {
				$this->excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
				$this->excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $a->no_akta);
				$this->excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $a->tgl_akta);
				$this->excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $a->bentuk_perbuatan_hukum);
				$this->excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $a->p_mengalihkan_nama);
				$this->excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $a->p_menerima_nama);
				$this->excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $a->jenis_dan_nomor_hak);
				$this->excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $a->luas_tanah);
				$this->excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $a->luas_bangunan);
				$this->excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $a->harga_transaksi);
				$this->excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $a->sppt_pbb_nop_tahun);
				$this->excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $a->sppt_ppb_njop);
				$this->excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $a->ssp_tanggal);
				$this->excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $a->ssp_nominal);
				$this->excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $a->sspd_bphtb_tanggal);
				$this->excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $a->sspd_bphtb_nominal);
				$this->excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $a->keterangan);

				$no++;
				$numrow++;
			}

			$filename='laporan penerbitan akta.xls';

			// Header file Excel
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'.$filename.'"');
			header('Cache-Control: max-age=0');

			$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');

			// Agar output didownload
			$objWriter->save('php://output');
		}
		else {
			redirect('login');
		}
	}

}
