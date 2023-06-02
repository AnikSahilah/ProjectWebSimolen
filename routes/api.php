    <?php

    use App\Http\Controllers\Api\V1\AuthController;
    use App\Http\Controllers\Api\V1\BarangController;
    use App\Http\Controllers\Api\V1\BengkelController;
    use App\Http\Controllers\Api\V1\MontirController;
    use App\Http\Controllers\Api\V1\PembelianController;
    use App\Http\Controllers\Api\V1\PemesananController;
    use App\Http\Controllers\Api\V1\RatingController;
    use App\Http\Controllers\Api\V1\CustomerController;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

    Route::prefix('v1')->group(function () {
        Route::post('/register', [AuthController::class, 'register'])->name('api.register');
        Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:login')->name('api.login');

        Route::middleware(['auth:sanctum'])->group(function () {
            Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');

            // bengkel
            Route::get('bengkel', [BengkelController::class, 'index'])->name('api.bengkel.index');
            Route::get('bengkel/search', [BengkelController::class, 'search'])->name('api.bengkel.search');
            Route::get('bengkel/{id}', [BengkelController::class, 'show'])->name('api.bengkel.show');

            // montir
            Route::get('montir', [MontirController::class, 'index'])->name('api.montir.index');
            Route::get('montir/search', [MontirController::class, 'search'])->name('api.montir.search');
            Route::get('montir/{id}', [MontirController::class, 'show'])->name('api.montir.show');

            // barang
            Route::get('barang', [BarangController::class, 'index'])->name('api.barang.index');
            Route::get('barang/search', [BarangController::class, 'search'])->name('api.barang.search');
            Route::get('barang/{id}', [BarangController::class, 'show'])->name('api.barang.show');

            // pemesanan montir
            Route::get('pemesanan-montir', [PemesananController::class, 'index'])->name('api.pemesanan.index');
            Route::post('pemesanan-montir', [PemesananController::class, 'store'])->name('api.pemesanan.store');
            Route::get('pemesanan-montir/{id}', [PemesananController::class, 'show'])->name('api.pemesanan.show');
            Route::put('pemesanan-montir/{id}/approve', [PemesananController::class, 'approve'])->middleware('can:montir')->name('api.pemesanan.approve');
            Route::put('pemesanan-montir/{id}/approve/customer', [PemesananController::class, 'approveCustomer'])->middleware('can:customer')->name('api.pemesanan.approve.customer');

            // pembelian barang
            Route::get('pembelian-barang', [PembelianController::class, 'index'])->name('api.pembelian.index');
            Route::get('pembelian-barang/{id}', [PembelianController::class, 'show'])->name('api.pembelian.show');
            Route::post('pembelian-barang', [PembelianController::class, 'store'])->name('api.pembelian.store');
            Route::put('pembelian-barang/{id}/approve/customer', [PembelianController::class, 'approveCustomer'])->middleware('can:customer')->name('api.pembelian.approve.customer');

            // rating
            Route::post('rating', [RatingController::class, 'store'])->name('api.rating.store');

            //cuctomer
            Route::put('customer', [CustomerController::class, 'update'])->name('api.customer.update');
            Route::delete('customer', [CustomerController::class, 'destroy'])->name('api.customer.destroy');
        });
    });
