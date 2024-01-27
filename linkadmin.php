<?php
@$page = $_GET['q'];
if (!empty($page)) {
    switch ($page) {

//beranda
        case 'pberanda':
            include './pages/pberanda/pberanda.php';
            break;
            // PROSES TAMBAH pberanda
        case 'prosestambahberanda':
            include './pages/pberanda/prosestambahberanda/prosestambahberanda.php';
            break;
            // PROSES EDIT pberanda
        case 'proseseditberanda':
            include './pages/pberanda/proseseditberanda/proseseditberanda.php';
            break;
            // PROSES HAPUS pberanda
        case 'proseshapusberanda':
            include './pages/pberanda/proseshapusberanda/proseshapusberanda.php';
            break;
//end of beranda


//Biodata

case 'pbiodata':
    include './pages/pbiodata/pbiodata.php';
    break;
    // PROSES TAMBAH pbiodata
case 'prosestambahbiodata':
    include './pages/pbiodata/prosestambahbiodata/prosestambahbiodata.php';
    break;
    // PROSES EDIT pbiodata
case 'proseseditbiodata':
    include './pages/pbiodata/proseseditbiodata/proseseditbiodata.php';
    break;
    // PROSES HAPUS pbiodata
case 'proseshapusbiodata':
    include './pages/pbiodata/proseshapusbiodata/proseshapusbiodata.php';
    break;


//end of biodata



//bantu-manik

case 'pbantu-manik':
    include './pages/pbantu-manik/pbantu-manik.php';
    break;
    // PROSES TAMBAH pbantu-manik
case 'prosestambahbantu-manik':
    include './pages/pbantu-manik/prosestambahbantu-manik/prosestambahbantu-manik.php';
    break;
    // PROSES EDIT pbantu-manik
case 'proseseditbantu-manik':
    include './pages/pbantu-manik/proseseditbantu-manik/proseseditbantu-manik.php';
    break;
    // PROSES HAPUS pbantu-manik
case 'proseshapusbantu-manik':
    include './pages/pbantu-manik/proseshapusbantu-manik/proseshapusbantu-manik.php';
    break;


//end of bantu-manik


//galeri

case 'pgaleri':
    include './pages/pgaleri/pgaleri.php';
    break;
    // PROSES TAMBAH pgaleri
case 'prosestambahgaleri':
    include './pages/pgaleri/prosestambahgaleri/prosestambahgaleri.php';
    break;
    // PROSES EDIT pgaleri
case 'proseseditgaleri':
    include './pages/pgaleri/proseseditgaleri/proseseditgaleri.php';
    break;
    // PROSES HAPUS pgaleri
case 'proseshapusgaleri':
    include './pages/pgaleri/proseshapusgaleri/proseshapusgaleri.php';
    break;


//end of galeri


//walpaper

case 'pwalpaper':
    include './pages/pwalpaper/pwalpaper.php';
    break;
    // PROSES TAMBAH pwalpaper
case 'prosestambahwalpaper':
    include './pages/pwalpaper/prosestambahwalpaper/prosestambahwalpaper.php';
    break;
    // PROSES EDIT pwalpaper
case 'proseseditwalpaper':
    include './pages/pwalpaper/proseseditwalpaper/proseseditwalpaper.php';
    break;
    // PROSES HAPUS pwalpaper
case 'proseshapuswalpaper':
    include './pages/pwalpaper/proseshapuswalpaper/proseshapuswalpaper.php';
    break;


//end of walpaper


//news
case 'pnews':
    include './pages/pnews/pnews.php';
    break;
    // PROSES TAMBAH pnews
case 'prosestambahnews':
    include './pages/pnews/prosestambahnews/prosestambahnews.php';
    break;
    // PROSES EDIT pnews
case 'proseseditnews':
    include './pages/pnews/proseseditnews/proseseditnews.php';
    break;
    // PROSES HAPUS pnews
case 'proseshapusnews':
    include './pages/pnews/proseshapusnews/proseshapusnews.php';
    break;
//end of news


//media-center
case 'pmedia-center':
    include './pages/pmedia-center/pmedia-center.php';
    break;
    // PROSES TAMBAH pmedia-center
case 'prosestambahmedia-center':
    include './pages/pmedia-center/prosestambahmedia-center/prosestambahmedia-center.php';
    break;
    // PROSES EDIT pmedia-center
case 'proseseditmedia-center':
    include './pages/pmedia-center/proseseditmedia-center/proseseditmedia-center.php';
    break;
    // PROSES HAPUS pmedia-center
case 'proseshapusmedia-center':
    include './pages/pmedia-center/proseshapusmedia-center/proseshapusmedia-center.php';
    break;
//end of media-center


//aduan
            case 'aduan':
                include './pages/aduan/aduan.php';
                break;


        // case 'pbiodata':
        //     include './pages/pbiodata/pbiodata.php';
        //     break;

        // case 'pgaleri':
        //     include './pages/pgaleri/pgaleri.php';
        //     break;

        case 'ppengalaman':
            include './pages/ppengalaman/ppengalaman.php';
            break;

        case 'plapornik':
            include './pages/plapornik/plapornik.php';
            break;





            //Logout
        case 'logout':
            include 'logout.php';
            break;
    }
} else {
    include './pages/pberanda/pberanda.php';
}