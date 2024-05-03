// Importa o arquivo de bootstrap do aplicativo.
import './bootstrap';
// Importa o arquivo de estilo CSS do aplicativo.
import '../css/app.css';
// Importa a função createRoot do pacote react-dom/client.
import { createRoot } from 'react-dom/client';
// Importa a função createInertiaApp do pacote @inertiajs/react.
import { createInertiaApp } from '@inertiajs/react';
// Importa a função resolvePageComponent do pacote laravel-vite-plugin/inertia-helpers.
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

// Define o nome do aplicativo, usando a variável de ambiente VITE_APP_NAME ou 'Laravel' como padrão.
const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

// Cria o aplicativo Inertia.
createInertiaApp({
    // Define a função que adiciona o nome do aplicativo ao título da página.
    title: (title) => `${title} - ${appName}`,

    // Define a função que resolve o componente de página correspondente com base no nome fornecido.
    resolve: (name) => resolvePageComponent(`./Pages/${name}.jsx`, import.meta.glob('./Pages/**/*.jsx')),

    // Define a função de configuração do aplicativo.
    setup({ el, App, props }) {
        // Cria uma raiz de renderização React.
        const root = createRoot(el);

        // Renderiza o componente raiz com as props fornecidas na raiz de renderização React.
        root.render(<App {...props} />);
    },

    // Configuração da barra de progresso de carregamento do aplicativo.
    progress: {
        color: '#4B5563', // Define a cor da barra de progresso.
    },
});
