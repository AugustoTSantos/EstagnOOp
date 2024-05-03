// Esta é a definição da função de componente funcional chamada Checkbox.
export default function Checkbox({ className = '', ...props }) {
    // Esta função recebe um objeto de props, e a desestruturação é usada para extrair a prop className.
    // O spread operator (...) é usado para passar todas as outras props não explicitamente desestruturadas para o <input> resultante.

    return (
        // Aqui começa o retorno do componente. Ele renderiza um elemento <input>.
        <input
            {...props} // O spread operator é usado para adicionar todas as props passadas para o <input>.
            type="checkbox" // Define o tipo do input como "checkbox".
            className={
                /* A classe do input é definida aqui. Ela é composta de várias classes concatenadas dinamicamente.
                As classes padrão fornecem estilos básicos para o checkbox, como borda arredondada, cor da borda, cor do texto e sombra.
                A classe className passada como prop é adicionada para permitir estilos personalizados.*/
                'rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800 ' +
                className // A classe className passada como prop é concatenada aqui.
            }
        />
        // O input resultante terá todas as props passadas, incluindo a classe personalizada, e será estilizado de acordo com as classes definidas.
    );
}
// Aqui termina a definição da função Checkbox.
// A função exportada pode ser importada e usada em outros componentes React.
