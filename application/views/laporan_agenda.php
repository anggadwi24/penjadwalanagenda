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
                    <h4 for="">Kode Kegiatan : </h4>
                    <label><?= $row['agenda_code']?></label>
                </td>
                <td class="border">
                    <h4 for="">Kategori Kegiatan : </h4>
                    <label><?= ucfirst($row['agenda_kategori'])?></label>
                </td>
                <td class="border">
                    <h4 for="">Tgl Validasi : </h4>
                    <label><?= date('d/m/Y',strtotime($valid['valid_date']))?></label>
                </td>
            </tr>
            <tr>
                <td class="border" colspan="3">
                    <h4 for="">Nama Kegiatan :</h4>
                    <label><?=  $row['agenda_name']?></label>
                </td>
            </tr>
            <tr>
                <td class="border" colspan="3">
                    <h4 for="">Perihal Kegiatan :</h4>
                    <label><?=  $row['agenda_perihal']?></label>
                </td>
            </tr>
            <tr>
                <td width="50%" class="border">
                    <h4 for="">Tempat Kegiatan :</h4>
                    <label><?= $row['agenda_place']?></label>
                </td>
                <td width="25%" class="border">
                    <h4 for="">Tgl Mulai :</h4>
                    <label><?= date('d/m/Y H:i',strtotime($row['agenda_date_start']))?></label>
                </td>
                <td width="25%" class="border">
                    <h4 for="">Tgl Selesai :</h4>
                    <label><?= date('d/m/Y H:i',strtotime($row['agenda_date_end']))?></label>
                </td>

            </tr>
            <tr>
                <td width="50%" class="border">
                    <h4 for="">Penyelenggara : </h4>
                    <label><?= $row['agenda_penyelenggara']?></label>
                </td>
                <td colspan="2" class="border">
                    <h4 for="">Penanggung Jawab :</h4>
                    <label><?= $pj['pegawai_name']?></label>
                </td>
            </tr> 
            <tr>
                <td colspan="3 " class="border">
                    <h4 for="">Intruksi Camat</h4>
                    <label><?= $valid['valid_intruksi']?></label>
                </td>
                
            </tr>
            <tr>
                <td colspan="3"><br><br><br></td>
            </tr>
            <tr >
                <td colspan="3" class="border" >
                    <h4 for="">Hasil/Notulen Kegiatan :</h4>
                    <label><?= $hasil['hk_notulen']?></label>
                </td>
                
            </tr>
        </table>
    </body>
</html>