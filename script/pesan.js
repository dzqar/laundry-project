// UNTUK SEMUA HALAMAN TIAP LEVEL
<?php 
/*Jika sudah pernah login/tidak bisa back ke halaman sebelumnya jika belum log out*/
if(isset($_GET['pesan'])){
  if($_GET['pesan']=="pernah_login"){
    ?>
    Swal.fire({
      icon: 'info',
      title: 'Halo!',
      text: 'Selamat datang kembali, <?php echo $username; ?>!',
      confirmButtonText: 'Ok',
      allowOutsideClick: false,
      allowEscapeKey: false,
      footer: '<a href="../logout.php">Log Out?</a>'
    }).then((result) => {
      if (result.isConfirmed) {
      window.location="../<?php echo $level; ?>/"//Ganti sesuai level/hak akses
    }
  })

    <?php
    /*Ketika tidak memiliki hak akses tersebut*/
  }elseif ($_GET['pesan']=="noaccess") {
    ?>
    Swal.fire({
      icon: 'error',
      title: 'Error!',
      text: 'Anda tidak memiliki akses, <?php echo $username; ?>!',
      allowOutsideClick: false,
      allowEscapeKey: false,
      confirmButtonText: 'Ok'
    }).then((result) => {
      if (result.isConfirmed) {
    window.location='../<?php echo $level; ?>/' //Ganti sesuai level/hak akses
  }
})
    <?php
    // Daftar
  }elseif($_GET['pesan']=="usernameAlready"){
    // Jika username sudah terdaftar
    ?>
    Swal.fire({
      icon: 'error',
      title: 'Error!',
      text: 'Username Sudah Terdaftar!',
      allowOutsideClick: false,
      allowEscapeKey: false,
      confirmButtonText: 'Baiklah'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "daftar.php"
      }
    })
    <?php
        // Login
      }elseif($_GET['pesan']=="gagal"){
        ?>
          //Jika username dan/atau passwordnya salah
          Swal.fire({
            icon: 'error',
            title: 'Salah!',
            text: 'Username atau password anda salah!',
            allowOutsideClick: false,
            allowEscapeKey: false,
            confirmButtonText: 'Ok'
          }).then((result) => {
            if (result.isConfirmed) {
                    //Di alihkan ke halaman login.php
                    window.location = "login.php"
                  }
                })
          <?php
          // Login
        }elseif ($_GET['pesan']=="belum_login") {
          ?>
            //Jika belum pernah melakukan login sebelumnya
            Swal.fire({
              icon: 'question',
              title: 'Belum Login!',
              text: 'Anda belum pernah melakukan login sebelumnya!',
              allowOutsideClick: false,
              allowEscapeKey: false,
              confirmButtonText: 'Ok'
            }).then((result) => {
              if (result.isConfirmed) {
                      //Di alihkan ke halaman login.php
                      window.location = "login.php"
                    }
                  })
            <?php
          }elseif ($_GET['pesan'] == 'berhasilUpProfile'){
            ?>
            Swal.fire({
              icon: 'success',
              title: 'Berhasil mengupdate profile',
              allowOutsideClick: false,
              allowEscapeKey: false,
              confirmButtonText: 'Ok'
            }).then((result) => {
              if (result.isConfirmed) {
                      //Di alihkan ke halaman login.php
                      window.location = "../<?php echo $level; ?>/"
                    }
                  })
            <?php
          }elseif ($_GET['pesan'] == 'gagalUkuran'){
            ?>
            //Jika username dan/atau passwordnya salah
            Swal.fire({
              icon: 'error',
              title: 'Ukuran terlalu besar!',
              text: 'Coba menggunakan foto yang ukurannya lebih kecil!',
              allowOutsideClick: false,
              allowEscapeKey: false,
              confirmButtonText: 'Ok'
            }).then((result) => {
              if (result.isConfirmed) {
                    //Di alihkan ke halaman login.php
                    window.location = "../<?php echo $level; ?>/"
                  }
                })
            <?php
          }elseif ($_GET['pesan'] == 'gagalEkstensi'){
            ?>
            //Jika username dan/atau passwordnya salah
            Swal.fire({
              icon: 'error',
              title: 'Ekstensi tidak sesuai!',
              text: 'Coba ganti format foto yang sesuai!',
              allowOutsideClick: false,
              allowEscapeKey: false,
              confirmButtonText: 'Ok'
            }).then((result) => {
              if (result.isConfirmed) {
                    //Di alihkan ke halaman login.php
                    window.location = "../<?php echo $level; ?>/"
                  }
                })
            <?php
          }elseif ($_GET['pesan'] == 'gagalHapusFotoDefault'){
            ?>
          //Jika username dan/atau passwordnya salah
          Swal.fire({
            icon: 'error',
            title: 'Gagal Hapus Foto!',
            text: 'Anda tidak bisa menghapus foto bawaan sistem!',
            allowOutsideClick: false,
            allowEscapeKey: false,
            confirmButtonText: 'Ok'
          }).then((result) => {
            if (result.isConfirmed) {
                    //Di alihkan ke halaman login.php
                    window.location = "../<?php echo $level; ?>/"
                  }
                })

// AWAL FUNCTION PESAN POP UP CUSTOMER

  // PESANAN
  <?php
          // Jika pesan = 'berhasilLB'
        }elseif ($_GET['pesan'] == 'berhasilBuatPesanan') {
          ?>
          Swal.fire({
            icon: 'success',
            title: 'Berhasil membuat pesanan baru!',
            allowOutsideClick: false,
            allowEscapeKey: false,
            confirmButtonText: 'Ok'
          }).then((result) => {
            if (result.isConfirmed) {
                // Jika di confirm, maka akan halaman akan di refresh
                window.location = "../<?php echo $level; ?>/"
              }
            })
          <?php
        }elseif ($_GET['pesan'] == 'berhasilBatalPesanan') {
          ?>
          Swal.fire({
            icon: 'success',
            title: 'Berhasil membatalkan Pesanan!',
            allowOutsideClick: false,
            allowEscapeKey: false,
            confirmButtonText: 'Ok'
          }).then((result) => {
            if (result.isConfirmed) {
                // Jika di confirm, maka akan halaman akan di refresh
                window.location = "../<?php echo $level; ?>/"
              }
            })
          <?php
        }elseif ($_GET['pesan'] == 'gagalBuatPesanan') {
          ?>
          Swal.fire({
            icon: 'error',
            title: 'Gagal membuat Pesanan!',
            allowOutsideClick: false,
            allowEscapeKey: false,
            confirmButtonText: 'Ok'
          }).then((result) => {
            if (result.isConfirmed) {
                // Jika di confirm, maka akan halaman akan di refresh
                window.location = "../<?php echo $level; ?>/"
              }
            })
  // TRANSAKSI
  <?php
      // Jika pesan = 'berhasilLB'
    }elseif ($_GET['pesan'] == 'berhasilTransaksi') {
      ?>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil melakukan Transaksi!',
        allowOutsideClick: false,
        allowEscapeKey: false,
        confirmButtonText: 'Ok'
      }).then((result) => {
        if (result.isConfirmed) {
            // Jika di confirm, maka akan halaman akan di refresh
            window.location = "../<?php echo $level; ?>/"
          }
        })
      <?php
    }elseif ($_GET['pesan'] == 'gagalTransaksi') {
      ?>
      Swal.fire({
        icon: 'error',
        title: 'Gagal melakukan Transaksi! Silahkan coba lagi',
        allowOutsideClick: false,
        allowEscapeKey: false,
        confirmButtonText: 'Ok'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = "../<?php echo $level; ?>/"
        }
      })
  // REVIEW
  <?php
      // Jika pesan = 'berhasilLB'
    }elseif ($_GET['pesan'] == 'berhasilReview') {
      ?>
      Swal.fire({
        icon: 'success',
        title: 'Terima Kasih Telah Memberikan Ulasan Anda!',
        allowOutsideClick: false,
        allowEscapeKey: false,
        confirmButtonText: 'Ok'
      }).then((result) => {
        if (result.isConfirmed) {
            // Jika di confirm, maka akan halaman akan di refresh
            window.location = "../<?php echo $level; ?>/"
          }
        })
// AKHIR FUNCTION PESAN POP UP CUSTOMER

// AWAL FUNCTION PESAN POP UP KASIR

  // DATA BAHAN
  <?php
      // Jika pesan = 'berhasilLB'
    }elseif ($_GET['pesan'] == 'berhasilLB') {
      ?>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil mengurangi bahan!',
        allowOutsideClick: false,
        allowEscapeKey: false,
        confirmButtonText: 'Ok'
      }).then((result) => {
        if (result.isConfirmed) {
            // Jika di confirm, maka halaman akan di refresh
            window.location = "../<?php echo $level; ?>/"
          }
        })
  // PESANAN
  <?php
      // Jika pesan = 'berhasilLB'
    }elseif ($_GET['pesan'] == 'berhasilSelesaiPesanan') {
      ?>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil menyelesaikan Pesanan!',
        allowOutsideClick: false,
        allowEscapeKey: false,
        confirmButtonText: 'Ok'
      }).then((result) => {
        if (result.isConfirmed) {
            // Jika di confirm, maka akan halaman akan di refresh
            window.location = "../<?php echo $level; ?>/"
          }
        })
      <?php
    }elseif ($_GET['pesan'] == 'berhasilBatalPesanan') {
      ?>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil membatalkan Pesanan!',
        allowOutsideClick: false,
        allowEscapeKey: false,
        confirmButtonText: 'Ok'
      }).then((result) => {
        if (result.isConfirmed) {
            // Jika di confirm, maka akan halaman akan di refresh
            window.location = "../<?php echo $level; ?>/"
          }
        })
      <?php
    }elseif ($_GET['pesan'] == 'berhasilHapusPesanan') {
      ?>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil menghapus semua Daftar Pesanan!',
        allowOutsideClick: false,
        allowEscapeKey: false,
        confirmButtonText: 'Ok'
      }).then((result) => {
        if (result.isConfirmed) {
            // Jika di confirm, maka akan halaman akan di refresh
            window.location = "../<?php echo $level; ?>/"
          }
        })
      <?php
    }elseif ($_GET['pesan'] == 'berhasilTerimaPesanan') {
      ?>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil menerima Pesanan!',
        allowOutsideClick: false,
        allowEscapeKey: false,
        confirmButtonText: 'Ok'
      }).then((result) => {
        if (result.isConfirmed) {
            // Jika di confirm, maka akan halaman akan di refresh
            window.location = "../<?php echo $level; ?>/"
          }
        })
  // TRANSAKSI
  <?php
      // Jika pesan = 'berhasilLB'
    }elseif ($_GET['pesan'] == 'berhasilSelesaiTransaksi') {
      ?>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil menyelesaikan Transaksi!',
        allowOutsideClick: false,
        allowEscapeKey: false,
        confirmButtonText: 'Ok'
      }).then((result) => {
        if (result.isConfirmed) {
            // Jika di confirm, maka akan halaman akan di refresh
            window.location = "../<?php echo $level; ?>/"
          }
        })
      <?php
    }elseif ($_GET['pesan'] == 'berhasilBatalTransaksi') {
      ?>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil membatalkan Transaksi!',
        allowOutsideClick: false,
        allowEscapeKey: false,
        confirmButtonText: 'Ok'
      }).then((result) => {
        if (result.isConfirmed) {
            // Jika di confirm, maka akan halaman akan di refresh
            window.location = "../<?php echo $level; ?>/"
          }
        })
// AKHIR FUNCTION PESAN POP UP KASIR

// AWAL FUNCTION PESAN POP UP MANAGER
  // AKUN PEGAWAI
  <?php
                // Jika pesan = 'berhasilhPeg'
              }elseif ($_GET['pesan'] == 'berhasilhPeg') {
                ?>
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil menghapus akun!',
                  allowOutsideClick: false,
                  allowEscapeKey: false,
                  confirmButtonText: 'Ok'
                }).then((result) => {
                  if (result.isConfirmed) {
                            // Jika di confirm, merefresh halaman
                            window.location = "../<?php echo $level; ?>/"
                          }
                        })
                <?php
                // Jika pesan = 'berhasilUbah'
              }elseif ($_GET['pesan'] == 'berhasilUbahAkun') {
                ?>
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil membuat perubahan akun!',
                  allowOutsideClick: false,
                  allowEscapeKey: false,
                  confirmButtonText: 'Ok'
                }).then((result) => {
                  if (result.isConfirmed) {
                            // Jika di confirm, merefresh halaman
                            window.location = "../<?php echo $level; ?>/"
                          }
                        })
                <?php
              }elseif ($_GET['pesan'] == 'berhasilBuatAkun') {
                ?>
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil membuat akun!',
                  allowOutsideClick: false,
                  allowEscapeKey: false,
                  confirmButtonText: 'Ok'
                }).then((result) => {
                  if (result.isConfirmed) {
                    // Jika di confirm, merefresh halaman
                    window.location = "../<?php echo $level; ?>/"
                  }
                })
  // DATA BAHAN
  <?php
      // Jika pesan = 'berhasilLB'
    }elseif ($_GET['pesan'] == 'berhasilHapusB') {
      ?>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil menghapus bahan!',
        allowOutsideClick: false,
        allowEscapeKey: false,
        confirmButtonText: 'Ok'
      }).then((result) => {
        if (result.isConfirmed) {
            // Jika di confirm, maka halaman akan di refresh
            window.location = "../<?php echo $level; ?>/"
          }
        })
      <?php
        // Jika pesan = 'berhasilLapor'
      }elseif ($_GET['pesan'] == 'berhasilTambahB') {
        ?>
        Swal.fire({
          icon: 'success',
          title: 'Berhasil Menambah Bahan!',
          allowOutsideClick: false,
          allowEscapeKey: false,
          confirmButtonText: 'Ok'
        }).then((result) => {
          if (result.isConfirmed) {
          // Jika di confirm, maka halaman akan di refresh
          window.location = "../<?php echo $level; ?>/"
        }
      })
        <?php
      }elseif ($_GET['pesan'] == 'berhasilEditB'){
        ?>
        Swal.fire({
          icon: 'success',
          title: 'Berhasil Edit Bahan!',
          allowOutsideClick: false,
          allowEscapeKey: false,
          confirmButtonText: 'Ok'
        }).then((result) => {
          if (result.isConfirmed) {
          // Jika di confirm, maka halaman akan di refresh
          window.location = "../<?php echo $level; ?>/"
        }
      })
// AKHIR FUNCTION PESAN POP UP MANAGER

// AWAL FUNCTION PESAN POP UP ADMIN
  // DATA BAHAN
  <?php
}elseif ($_GET['pesan'] == 'berhasilbersihLB') {
  ?>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil membersihkan!',
    allowOutsideClick: false,
    allowEscapeKey: false,
    confirmButtonText: 'Ok'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location = "../<?php echo $level; ?>/"
    }
  })
  <?php
}elseif ($_GET['pesan'] == 'berhasilTerima') {
  ?>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil menerima!',
    allowOutsideClick: false,
    allowEscapeKey: false,
    confirmButtonText: 'Ok'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location = "../<?php echo $level; ?>/"
    }
  })
  <?php
}elseif ($_GET['pesan'] == 'berhasilUpData') {
  ?>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil Mengupdate Data!',
    allowOutsideClick: false,
    allowEscapeKey: false,
    confirmButtonText: 'Ok'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location = "../<?php echo $level; ?>/"
    }
  })
  <?php
}elseif ($_GET['pesan'] == 'gagalUpData') {
  ?>
  Swal.fire({
    icon: 'error',
    title: 'Gagal Mengupdate Data!',
    allowOutsideClick: false,
    allowEscapeKey: false,
    confirmButtonText: 'Ok'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location = "../<?php echo $level; ?>/"
    }
  })
  // LAYANAN
  <?php
        // Jika pesan di url hasilnya 'berhasilInputLay'
      }elseif ($_GET['pesan'] == 'berhasilInputLay') {
        ?>
        Swal.fire({
          icon: 'success',
          title: 'Berhasil menambahkan layanan baru!',
          allowOutsideClick: false,
          allowEscapeKey: false,
          confirmButtonText: 'Ok'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = "../<?php echo $level; ?>/"
          }
        })
        <?php
        // Jika pesan di url hasilnya 'berhasilEditLay'
      }elseif ($_GET['pesan'] == 'berhasilEditLay') {
        ?>
        Swal.fire({
          icon: 'success',
          title: 'Berhasil mengedit layanan!',
          allowOutsideClick: false,
          allowEscapeKey: false,
          confirmButtonText: 'Ok'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = "../<?php echo $level; ?>/"
          }
        })
        <?php
        // Jika pesan di url hasilnya 'berhasilHapusL'
      }elseif ($_GET['pesan'] == 'berhasilHapusL') {
        ?>
        Swal.fire({
          icon: 'success',
          title: 'Berhasil menghapus layanan!',
          allowOutsideClick: false,
          allowEscapeKey: false,
          confirmButtonText: 'Ok'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = "../<?php echo $level; ?>/"
          }
        })
        <?php
      }elseif ($_GET['pesan'] == 'gagalInputLay') {
        # code...
        ?>
        Swal.fire({
          icon: 'error',
          title: 'Gagal Input layanan!',
          allowOutsideClick: false,
          allowEscapeKey: false,
          confirmButtonText: 'Ok'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = "../<?php echo $level; ?>/"
          }
        })
  // TRANSAKSI
  <?php
}elseif ($_GET['pesan'] == 'berhasilHapusTransaksi') {
  ?>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil menghapus semua Daftar Transaksi!',
    allowOutsideClick: false,
    allowEscapeKey: false,
    confirmButtonText: 'Ok'
  }).then((result) => {
    if (result.isConfirmed) {
            // Jika di confirm, maka akan halaman akan di refresh
            window.location = "../<?php echo $level; ?>/"
          }
        })
  // DATA METODE
  <?php
}elseif ($_GET['pesan'] == 'berhasilTambahM') {
  ?>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil menambah data metode baru!',
    allowOutsideClick: false,
    allowEscapeKey: false,
    confirmButtonText: 'Ok'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location = "../<?php echo $level; ?>/"
    }
  })
  <?php
}elseif ($_GET['pesan'] == 'berhasilEditM') {
  ?>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil mengedit data metode!',
    allowOutsideClick: false,
    allowEscapeKey: false,
    confirmButtonText: 'Ok'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location = "../<?php echo $level; ?>/"
    }
  })
  <?php
}elseif ($_GET['pesan'] == 'berhasilHapusM') {
  ?>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil menghapus data metode!',
    allowOutsideClick: false,
    allowEscapeKey: false,
    confirmButtonText: 'Ok'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location = "../<?php echo $level; ?>/"
    }
  })
  <?php
}
}
?>
// AKHIR FUNCTION PESAN POP UP ADMIN

