import './bootstrap';

// Import Bootstrap JavaScript secara eksplisit
import * as bootstrap from 'bootstrap'; // Ini akan mengimpor semua fungsionalitas Bootstrap JS, termasuk Popper.js

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Anda juga bisa menambahkan ini jika ingin Bootstrap tersedia secara global (tidak wajib jika sudah diimpor di atas)
window.bootstrap = bootstrap;