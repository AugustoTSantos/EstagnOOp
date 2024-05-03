import { forwardRef, useEffect, useRef } from 'react';

// Define o componente de função TextInput utilizando forwardRef para permitir o encaminhamento de ref.
export default forwardRef(function TextInput({ type = 'text', className = '', isFocused = false, ...props }, ref) {
    // Cria uma referência para o elemento de entrada usando useRef se não for fornecido um ref externo.
    const input = ref ? ref : useRef();

    // useEffect é usado para executar efeitos secundários no componente.
    useEffect(() => {
        // Se a propriedade isFocused for verdadeira, define o foco no campo de entrada.
        if (isFocused) {
            input.current.focus();
        }
    }, []);

    // Renderiza o elemento <input> com as propriedades e classes CSS apropriadas.
    return (
        <input
            {...props} // Passa todas as outras propriedades diretamente para o elemento <input>.
            type={type} // Define o tipo do campo de entrada com base na propriedade 'type' recebida.
            className={
                // Concatenação de classes CSS para estilizar o campo de entrada.
                'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm ' +
                className // Adiciona classes CSS adicionais passadas como propriedade.
            }
            ref={input} // Define a referência do elemento de entrada para a referência criada anteriormente.
        />
    );
});
