// Importa o componente Link do pacote '@inertiajs/react'.
import { Link } from '@inertiajs/react';

// Define o componente de função ResponsiveNavLink e recebe as seguintes propriedades:
// - active: Uma flag booleana indicando se o link está ativo ou não.
// - className: Classes CSS adicionais a serem aplicadas ao link.
// - children: Elementos filhos do link (normalmente, texto).
// - props: Outras propriedades que podem ser passadas para o elemento <Link>.
export default function ResponsiveNavLink({ active = false, className = '', children, ...props }) {
    return (
        // Renderiza o elemento <Link> com as propriedades e classes CSS apropriadas.
        <Link
            {...props} // Passa todas as outras propriedades diretamente para o componente Link.
            className={
                // Concatenação de classes CSS com base em diferentes condições e propriedades.
                `w-full flex items-start ps-3 pe-4 py-2 border-l-4 ` +
                // Adiciona classes CSS diferentes com base no estado do link (ativo ou não).
                (active
                    ? 'border-indigo-400 dark:border-indigo-600 text-indigo-700 dark:text-indigo-300 bg-indigo-50 dark:bg-indigo-900/50 focus:text-indigo-800 dark:focus:text-indigo-200 focus:bg-indigo-100 dark:focus:bg-indigo-900 focus:border-indigo-700 dark:focus:border-indigo-300'
                    : 'border-transparent text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 focus:text-gray-800 dark:focus:text-gray-200 focus:bg-gray-50 dark:focus:bg-gray-700 focus:border-gray-300 dark:focus:border-gray-600'
                ) +
                // Adiciona classes CSS adicionais passadas como propriedade.
                ` text-base font-medium focus:outline-none transition duration-150 ease-in-out ${className}`
            }
        >
            {children} {/* Renderiza os elementos filhos do link (normalmente, texto). */}
        </Link>
    );
}
