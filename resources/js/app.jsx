import { createInertiaApp } from '@inertiajs/react';
import '../css/app.css';

createInertiaApp({
    pages: './Pages',
    title: (title) => (title ? `${title} · Vé vui chơi Phú Quốc` : 'Vé vui chơi Phú Quốc'),
});
