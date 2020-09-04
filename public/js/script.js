$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('#nis').change(function() {
        $.post('/tabungan/get/'+ $(this).val(), function(response) {
            if (response.success) {
                console.log(response.saldo);
                
                $('#saldo').val('Rp. ' + response.saldo);
                let max = response.saldo;
                max = max.replace(/,/g, '');
                
                $('#tarik').attr({'max': max});
            }
        }, 'json');
    });
    
    let nama_siswa = $('#nama_siswa').text();
    let nis = $('#nis').text();
    let kelas = $('#kelas').text();
    
    $('#info-nama').append(nama_siswa);
    $('#info-nis').append(nis);
    $('#info-kelas').append(kelas);
    
    // login
    $('#form').submit((e) => {
        e.preventDefault();
        $('#form').ajaxSubmit({
            success: res => {
                if (res === true) {
                    Swal.fire("Login Berhasil", "Klik OK untuk melanjutkan", "success").then((ok) => {
                        if (ok) {
                            window.location.reload();
                        }
                        window.location.reload();
                    });
                } else if (res === false) {
                    Swal.fire("Login Gagal", "Email atau Password salah", "error");
                } else {
                    Swal.fire("Login Gagal", "Email belum terdaftar", "error");
                }
        }
        });
    });
    
    // logout
    $('#buttonLogout').on('click', function() {
        $('#formLogout').submit(e => {
            e.preventDefault();
            $('#formLogout').ajaxSubmit({
                success: res => {
                    Swal.fire(res.title, res.text, res.type).then((ok) => {
                        if (ok) {
                            window.location.href = res.route;
                        }
                        window.location.href = res.route;
                    });
                },
                error: () => {
                    Swal.fire("Gagal", "Logout Gagal", "error");
                }
            });
        });
    });
    
    // tambah siswa
    $('#tambahSiswa').submit((e) => {
        e.preventDefault();
        $('#tambahSiswa').ajaxSubmit({
            success: res => {
                Swal.fire(res.title, res.text, res.type).then((ok) => {
                    if (ok) {
                        window.location.reload();
                    }
                    window.location.reload();
                });
            },
            error: res => {
                Swal.fire(res.title, res.text, res.type);
            }
        });
    });
    
    // hapus siswa
    $('.hapusSiswa').on('click', function() {
        Swal.fire({
            title: "Anda yakin ?",
            text: "Menghapus ini akan menghapus data lain yang terkait",
            icon: "warning",
            showCancelButton: true
        }).then((isConfirm) => {
                if (isConfirm.value) {
                    let nis = $(this).data('id');
                    console.log(nis);
                    
                    $.ajax({
                        type: "DELETE",
                        url: '/siswa/delete/'+nis,
                        success: res => {
                            Swal.fire(res.title, res.text, res.type).then((ok) => {
                                if (ok) {
                                    window.location.reload();
                                }
                                window.location.reload();
                            });
                        },
                        error: () => {
                            Swal.fire("Gagal", "Data Gagal Dihapus", "error");
                        }
                    });
                } else {
                    Swal.fire("Batal", "Operasi Dibatalkan", "info");
                }
            }
        );
    });

    // Update siswa
    $('#editSiswa').submit((e) => {
        e.preventDefault();
        $('#editSiswa').ajaxSubmit({
            success: res => {
                Swal.fire(res.title, res.text, res.type).then((ok) => {
                    if (ok) {
                        window.location.href = res.route;
                    }
                    window.location.href = res.route;
                });
            },
            error: () => {
                Swal.fire("Gagal", "Data Gagal DiUpdate", "error");
            }
        });
    });

    // tambah kelas
    $('#tambahKelas').submit((e) => {
        e.preventDefault();
        $('#tambahKelas').ajaxSubmit({
            success: res => {
                Swal.fire(res.title, res.text, res.type).then((ok) => {
                    if (ok) {
                        window.location.reload();
                    }
                    window.location.reload();
                });
            },
            error: res => {
                Swal.fire(res.title, res.text, res.type);
            }
        });
    });

    // hapus siswa
    $('.hapusKelas').on('click', function() {
        Swal.fire({
            title: "Anda yakin ?",
            text: "Menghapus ini akan menghapus data lain yang terkait",
            icon: "warning",
            showCancelButton: true
        }).then((isConfirm) => {
                if (isConfirm.value) {
                    let idKelas = $(this).data('id');
                    console.log(idKelas);
                    
                    $.ajax({
                        type: "DELETE",
                        url: '/kelas/delete/'+idKelas,
                        success: res => {
                            Swal.fire(res.title, res.text, res.type).then((ok) => {
                                if (ok) {
                                    window.location.href = res.route;
                                }
                                window.location.href = res.route;
                            });
                        },
                        error: () => {
                            Swal.fire("Gagal", "Data Gagal Dihapus", "error");
                        }
                    });
                } else {
                    Swal.fire("Batal", "Operasi Dibatalkan", "info");
                }
            }
        );
    });

    // Update kelas
    $('#editKelas').submit((e) => {
        e.preventDefault();
        $('#editKelas').ajaxSubmit({
            success: res => {
                Swal.fire(res.title, res.text, res.type).then((ok) => {
                    if (ok) {
                        window.location.href = res.route;
                    }
                    window.location.href = res.route;
                });
            },
            error: () => {
                Swal.fire("Gagal", "Data Gagal DiUpdate", "error");
            }
        });
    });

    // Hapus setor
    $('.hapusSetor').on('click', function() {
        Swal.fire({
            title: "Anda yakin ?",
            text: "Data yang dihapus tidak dapat dipulihkan kembali!",
            icon: "warning",
            showCancelButton: true
        }).then((isConfirm) => {
                if (isConfirm.value) {
                    let idSetor = $(this).data('id');
                    $.ajax({
                        type: "DELETE",
                        url: '/setor/'+idSetor,
                        success: res => {
                            Swal.fire(res.title, res.text, res.type).then((ok) => {
                                if (ok) {
                                    window.location.href = res.route;
                                }
                                window.location.href = res.route;
                            });
                        },
                        error: () => {
                            Swal.fire("Gagal", "Data Gagal Dihapus", "error");
                        }
                    });
                } else {
                    Swal.fire("Batal", "Operasi Dibatalkan", "info");
                }
            }
        );
    });
    // Hapus tarik
    $('.hapusTarik').on('click', function() {
        Swal.fire({
            title: "Anda yakin ?",
            text: "Data yang dihapus tidak dapat dipulihkan kembali!",
            icon: "warning",
            showCancelButton: true
        }).then((isConfirm) => {
                if (isConfirm.value) {
                    let idTarik = $(this).data('id');
                    $.ajax({
                        type: "DELETE",
                        url: '/tarik/'+idTarik,
                        success: res => {
                            Swal.fire(res.title, res.text, res.type).then((ok) => {
                                if (ok) {
                                    window.location.href = res.route;
                                }
                                window.location.href = res.route;
                            });
                        },
                        error: () => {
                            Swal.fire("Gagal", "Data Gagal Dihapus", "error");
                        }
                    });
                } else {
                    Swal.fire("Batal", "Operasi Dibatalkan", "info");
                }
            }
        );
    });

    // Tambah setor
    $('#tambahSetorTarik').submit((e) => {
        e.preventDefault();
        $('#tambahSetorTarik').ajaxSubmit({
            success: res => {
                Swal.fire(res.title, res.text, res.type).then((ok) => {
                    if (ok) {
                        window.location.href = res.route;
                    }
                    window.location.href = res.route;
                });
            },
            error: res => {
                Swal.fire(res.title, res.text, res.type);
            }
        });
    });

    // Tambah Admin
    $('#tambahAdmin').submit((e) => {
        e.preventDefault();
        $('#tambahAdmin').ajaxSubmit({
            success: res => {
                Swal.fire(res.title, res.text, res.type).then((ok) => {
                    if (ok) {
                        window.location.reload();
                    }
                    window.location.reload();
                });
            },
            error: res => {
                Swal.fire(res.title, res.text, res.type);
            }
        });
    });

    // Hapus admin
    $('.hapusAdmin').on('click', function() {
        Swal.fire({
            title: "Anda yakin ?",
            text: "Data yang dihapus tidak dapat dipulihkan kembali!",
            icon: "warning",
            showCancelButton: true
        }).then((isConfirm) => {
                if (isConfirm.value) {
                    let idAdmin = $(this).data('id');
                    $.ajax({
                        type: "DELETE",
                        url: '/admin/delete/'+idAdmin,
                        success: res => {
                            Swal.fire(res.title, res.text, res.type).then((ok) => {
                                if (ok) {
                                    window.location.reload();
                                }
                                window.location.reload();
                            });
                        },
                        error: () => {
                            Swal.fire("Gagal", "Data Gagal Dihapus", "error");
                        }
                    });
                } else {
                    Swal.fire("Batal", "Operasi Dibatalkan", "info");
                }
            }
        );
    });

    // Update Admin
    $('#editAdmin').submit((e) => {
        e.preventDefault();
        $('#editAdmin').ajaxSubmit({
            success: res => {
                Swal.fire(res.title, res.text, res.type).then((ok) => {
                    if (ok) {
                        window.location.href = res.route;
                    }
                    window.location.href = res.route;
                });
            },
            error: () => {
                Swal.fire("Gagal", "Data Gagal DiUpdate", "error");
            }
        });
    });


});