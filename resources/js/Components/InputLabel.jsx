// Define o componente de função InputLabel e recebe as seguintes propriedades:
// - value: O texto a ser exibido como conteúdo da etiqueta. Se não fornecido, o conteúdo será fornecido pelos elementos filhos (children).
// - className: Classes CSS adicionais que podem ser fornecidas para estilização adicional.
// - children: Elementos filhos que podem ser fornecidos como conteúdo alternativo da etiqueta.
// - ...props: Qualquer outra propriedade que o componente pode receber e repassar.

export default function InputLabel({ value, className = '', children, ...props }) {
    // Renderiza a etiqueta (label) com base nas propriedades fornecidas.
    // Aplica classes CSS e outros atributos conforme necessário.
    return (
        <label {...props} className={`block font-medium text-sm text-gray-700 dark:text-gray-300 ` + className}>
            {/* O conteúdo da etiqueta pode ser fornecido através da propriedade 'value' ou dos elementos filhos. */}
            {value ? value : children}
        </label>
    );
}
