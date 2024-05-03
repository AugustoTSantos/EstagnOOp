// Define o componente de função InputError e recebe as seguintes propriedades:
// - message: A mensagem de erro a ser exibida. Se for fornecida, o componente será renderizado.
// - className: Classes CSS adicionais que podem ser fornecidas para estilização adicional.
// - ...props: Qualquer outra propriedade que o componente pode receber e repassar.

export default function InputError({ message, className = '', ...props }) {
    // Verifica se uma mensagem de erro foi fornecida.
    // Se sim, o componente renderiza um parágrafo com a mensagem de erro,
    // caso contrário, não renderiza nada.
    return message ? (
        // Renderiza o parágrafo com a mensagem de erro e aplica classes CSS conforme necessário.
        <p {...props} className={'text-sm text-red-600 dark:text-red-400 ' + className}>
            {message}
        </p>
    ) : null;
}
