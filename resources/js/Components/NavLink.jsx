// Importa o componente Link do pacote '@inertiajs/react'.
import { Link } from '@inertiajs/react';

// Define o componente de função NavLink e recebe as seguintes propriedades:
// - active: Uma flag booleana indicando se o link está ativo ou não.
// - className: Classes CSS adicionais a serem aplicadas ao link.
// - children: Elementos filhos do link.
// - props: Outras propriedades que podem ser passadas para o componente Link.
export default function NavLink({ active = false, className = '', children, ...props }) {
    return (
        // Renderiza o componente Link com as propriedades e classes CSS apropriadas.
        <Link
            {...props}
            className={
                // Classes CSS condicionais com base na flag active.
                'inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out focus:outline-none ' +
                // Classes CSS adicionais se o link estiver ativo.
                (active
                    ? 'border-indigo-400 dark:border-indigo-600 text-gray-900 dark:text-gray-100 focus:border-indigo-700 '
                    // Classes CSS adicionais se o link não estiver ativo.
                    : 'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 ') +
                // Classes CSS adicionais passadas como propriedade.
                className
            }
        >
            {children}
        </Link>
    );
}
