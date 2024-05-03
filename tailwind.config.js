// Importa o tema padrão do Tailwind CSS
import defaultTheme from 'tailwindcss/defaultTheme';
// Importa o plugin 'forms' do Tailwind CSS, que fornece estilos para formulários
import forms from '@tailwindcss/forms';

/**
 * Exporta a configuração do Tailwind CSS.
 * @type {import('tailwindcss').Config}
 */
export default {
    // Define os arquivos que o Tailwind CSS analisará em busca de classes usadas no HTML ou JSX
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.jsx',
    ],

    // Define o tema personalizado do Tailwind CSS
    theme: {
        // Permite estender ou substituir as definições existentes do tema
        extend: {
            // Define as fontes personalizadas
            fontFamily: {
                // Adiciona 'Figtree' à pilha de fontes sans-serif, além das fontes sans-serif padrão
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    // Define os plugins do Tailwind CSS a serem usados
    plugins: [forms],
};
