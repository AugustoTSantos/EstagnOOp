// Define o componente de função PrimaryButton e recebe as seguintes propriedades:
// - className: Classes CSS adicionais a serem aplicadas ao botão.
// - disabled: Uma flag booleana indicando se o botão está desabilitado ou não.
// - children: Elementos filhos do botão (normalmente, texto).
// - props: Outras propriedades que podem ser passadas para o elemento <button>.
export default function PrimaryButton({ className = '', disabled, children, ...props }) {
    return (
        // Renderiza o elemento <button> com as propriedades e classes CSS apropriadas.
        <button
            {...props} // Passa todas as outras propriedades diretamente para o elemento <button>.
            className={
                // Concatenação de classes CSS com base em diferentes condições e propriedades.
                `inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ` +
                // Adiciona a classe 'opacity-25' se o botão estiver desabilitado.
                (disabled && 'opacity-25') +
                // Adiciona classes CSS adicionais passadas como propriedade.
                className
            }
            // Define a propriedade 'disabled' com base no valor da propriedade 'disabled'.
            disabled={disabled}
        >
            {children} {/* Renderiza os elementos filhos do botão (normalmente, texto). */}
        </button>
    );
}
