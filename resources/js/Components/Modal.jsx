// Importa o Fragment do React para ser usado como invólucro para vários elementos.
import { Fragment } from 'react';

// Importa o componente Dialog e Transition do pacote '@headlessui/react'.
import { Dialog, Transition } from '@headlessui/react';

// Define o componente de função Modal e recebe as seguintes propriedades:
// - children: Elementos que serão renderizados dentro do modal.
// - show: Uma flag booleana indicando se o modal deve ser exibido ou não.
// - maxWidth: A largura máxima do modal. Pode ser 'sm', 'md', 'lg', 'xl' ou '2xl'.
// - closeable: Uma flag booleana indicando se o modal pode ser fechado pelo usuário.
// - onClose: Uma função de retorno de chamada que será chamada quando o modal for fechado.
export default function Modal({ children, show = false, maxWidth = '2xl', closeable = true, onClose = () => {} }) {
    // Função para fechar o modal, apenas se ele for fechável.
    const close = () => {
        if (closeable) {
            onClose();
        }
    };

    // Define a classe CSS correspondente à largura máxima do modal.
    const maxWidthClass = {
        sm: 'sm:max-w-sm',
        md: 'sm:max-w-md',
        lg: 'sm:max-w-lg',
        xl: 'sm:max-w-xl',
        '2xl': 'sm:max-w-2xl',
    }[maxWidth];

    // Renderiza o modal usando o componente Transition para adicionar animações de entrada e saída.
    return (
        <Transition show={show} as={Fragment} leave="duration-200">
            <Dialog
                as="div"
                id="modal"
                className="fixed inset-0 flex overflow-y-auto px-4 py-6 sm:px-0 items-center z-50 transform transition-all"
                onClose={close}
            >
                <Transition.Child
                    as={Fragment}
                    enter="ease-out duration-300"
                    enterFrom="opacity-0"
                    enterTo="opacity-100"
                    leave="ease-in duration-200"
                    leaveFrom="opacity-100"
                    leaveTo="opacity-0"
                >
                    {/* Camada de fundo escuro com transparência para cobrir a tela ao exibir o modal. */}
                    <div className="absolute inset-0 bg-gray-500/75 dark:bg-gray-900/75" />
                </Transition.Child>

                <Transition.Child
                    as={Fragment}
                    enter="ease-out duration-300"
                    enterFrom="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    enterTo="opacity-100 translate-y-0 sm:scale-100"
                    leave="ease-in duration-200"
                    leaveFrom="opacity-100 translate-y-0 sm:scale-100"
                    leaveTo="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                >
                    {/* Painel do modal que contém o conteúdo do modal. */}
                    <Dialog.Panel
                        className={`mb-6 bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto ${maxWidthClass}`}
                    >
                        {children}
                    </Dialog.Panel>
                </Transition.Child>
            </Dialog>
        </Transition>
    );
}
