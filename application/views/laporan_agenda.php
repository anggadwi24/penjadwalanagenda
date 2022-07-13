<html>
    <head></head>
    <body>
        <style>
            .border {
                border: 1px solid black;
                padding:5px;
            }
            .data{
                border-collapse: collapse;
            }
           
        </style>
        <table align="center" width="100%">
            <tr>
                <td width="13%">
                    <img src="./upload/docs/logo.png" alt="" style="width:120px;vertical-align: middle;">
                </td>
                <td style="text-align:center">
                    <h3 style="margin-bottom:0px;margin-top:3px;">PEMERINTAH KABUPATEN BADUNG</h3>
                    <h1 style="margin-bottom:0px;margin-top:3px;">KECAMATAN KUTA SELATAN</h1>
                    <p style="margin-top:5px;font-weight:bold">Jl. Kampus Unud Jimbaran Tlp. / Fax. : (0361) 704670, 703470</p>
                </td>
                
            </tr>
            <tr>
                <td colspan="2">
                    <hr style="border-top: 1px solid black;margin-top:0 !important;margin-bottom:3px;">
                    <hr style="border-top: 2px solid black;margin-top:0 !important">
                </td>
                

            </tr>
            
           
        </table>
        <table align="center" width="100%" style="margin-top:10px;" class="data bordered" >
            <tr>
                <td colspan="3"  class="border">
                    <h1 style="text-align:center;">Lembar Laporan</h1>
                </td>
            </tr>
            <tr >
                <td class="border">
                    <label for="">Kode Kegiatan : </label>
                    <h4><?= $row['agenda_code']?></h4>
                </td>
                <td class="border">
                    <label for="">Kategori Kegiatan : </label>
                    <h4><?= ucfirst($row['agenda_kategori'])?></h4>
                </td>
                <td class="border">
                    <label for="">Tgl Validasi : </label>
                    <h4><?= date('d/m/Y',strtotime($valid['valid_date']))?></h4>
                </td>
            </tr>
            <tr>
                <td class="border" colspan="3">
                    <label for="">Nama Kegiatan :</label>
                    <h4><?=  $row['agenda_name']?></h4>
                </td>
            </tr>
            <tr>
                <td class="border" colspan="3">
                    <label for="">Perihal Kegiatan :</label>
                    <h4><?=  $row['agenda_perihal']?></h4>
                </td>
            </tr>
            <tr>
                <td width="50%" class="border">
                    <label for="">Tempat Kegiatan :</label>
                    <h4><?= $row['agenda_place']?></h4>
                </td>
                <td width="25%" class="border">
                    <label for="">Tgl Mulai :</label>
                    <h4><?= date('d/m/Y H:i',strtotime($row['agenda_date_start']))?></h4>
                </td>
                <td width="25%" class="border">
                    <label for="">Tgl Selesai :</label>
                    <h4><?= date('d/m/Y H:i',strtotime($row['agenda_date_end']))?></h4>
                </td>

            </tr>
            <tr>
                <td width="50%" class="border">
                    <label for="">Penyelenggara : </label>
                    <h4><?= $row['agenda_penyelenggara']?></h4>
                </td>
                <td colspan="2" class="border">
                    <label for="">Penanggung Jawab :</label>
                    <h4><?= $pj['pegawai_name']?></h4>
                </td>
            </tr> 
            <tr>
                <td colspan="3 " class="border">
                    <label for="">Intruksi Camat</label>
                    <h4><?= $valid['valid_intruksi']?></h4>
                </td>
                
            </tr>
            <tr>
                <td colspan="3"><br><br><br></td>
            </tr>
            <tr >
                <td colspan="3" class="border" >
                    <label for="">Hasil/Notulen Kegiatan :</label>
                    <h4><?= $hasil['hk_notulen']?></h4>
                </td>
                
            </tr>
        </table>
    </body>
</html>