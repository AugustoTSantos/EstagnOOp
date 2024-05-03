// Define o componente de função SecondaryButton e recebe as seguintes propriedades:
// - type: O tipo do botão (por padrão é 'button').
// - className: Classes CSS adicionais a serem aplicadas ao botão.
// - disabled: Uma flag booleana indicando se o botão está desabilitado ou não.
// - children: Elementos filhos do botão (normalmente, texto).
// - props: Outras propriedades que podem ser passadas para o elemento <button>.
export default function SecondaryButton({ type = 'button', className = '', disabled, children, ...props }) {
    return (
        // Renderiza o elemento <button> com as propriedades e classes CSS apropriadas.
        <button
            {...props} // Passa todas as outras propriedades diretamente para o elemento <button>.
            type={type} // Define o tipo do botão com base na propriedade 'type' recebida.
            className={
                // Concatenação de classes CSS com base em diferentes condições e propriedades.
                `inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150 ` +
                // Adiciona uma classe adicional se o botão estiver desabilitado.
                (disabled && 'opacity-25') +
                // Adiciona classes CSS adicionais passadas como propriedade.
                ` ${className}`
            }
            disabled={disabled} // Define se o botão está desabilitado ou não com base na propriedade 'disabled'.
        >
            {children} {/* Renderiza os elementos filhos do botão (normalmente, texto). */}
        </button>
    );
}
