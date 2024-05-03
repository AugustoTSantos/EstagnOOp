// Aqui começa a definição da função de componente funcional chamada DangerButton.
export default function DangerButton({ className = '', disabled, children, ...props }) {
    // Esta função recebe um objeto de props, e a desestruturação é usada para extrair as props className, disabled e children.
    // O spread operator (...) é usado para passar todas as outras props não explicitamente desestruturadas para o <button> resultante.

    return (
        // Aqui começa o retorno do componente. Ele renderiza um elemento <button>.
        <button
            {...props} // O spread operator é usado para adicionar todas as props passadas para o <button>.
            className={
                // A classe do botão é definida aqui. Ela é composta de várias classes concatenadas dinamicamente.
                // As classes padrão fornecem estilos para um botão de perigo, como cor de fundo vermelha, texto branco e bordas arredondadas.
                // A classe className passada como prop é adicionada para permitir estilos personalizados.
                // A classe 'opacity-25' é adicionada se o botão estiver desativado.
                `inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ${
                    disabled && 'opacity-25'
                } ` + className // A classe className passada como prop é concatenada aqui.
            }
            disabled={disabled} // O atributo disabled do botão é definido com base na prop disabled.
        >
            {children} // O conteúdo do botão é renderizado dentro do botão, conforme fornecido pela prop children.
        </button>
        // O botão resultante terá todas as props passadas e estilos conforme definido pelas classes CSS.
    );
}
// Aqui termina a definição da função DangerButton.
// A função exportada pode ser importada e usada em outros componentes React.
