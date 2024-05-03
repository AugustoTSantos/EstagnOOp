import { useState, createContext, useContext, Fragment } from 'react';
import { Link } from '@inertiajs/react';
import { Transition } from '@headlessui/react';

// Contexto para gerenciar o estado do dropdown
const DropDownContext = createContext();

// Componente principal que envolve todo o dropdown e fornece o contexto
const Dropdown = ({ children }) => {
    // Estado para controlar se o dropdown está aberto ou fechado
    const [open, setOpen] = useState(false);

    // Função para alternar entre abrir e fechar o dropdown
    const toggleOpen = () => {
        setOpen((previousState) => !previousState);
    };

    // Renderiza o componente Provider do contexto e passa o estado e a função para os componentes filhos
    return (
        <DropDownContext.Provider value={{ open, setOpen, toggleOpen }}>
            <div className="relative">{children}</div>
        </DropDownContext.Provider>
    );
};

// Componente para renderizar o gatilho (trigger) do dropdown
const Trigger = ({ children }) => {
    // Usa o contexto para acessar o estado e a função para controlar o dropdown
    const { open, setOpen, toggleOpen } = useContext(DropDownContext);

    // Renderiza o componente de gatilho e o adiciona um evento de clique para alternar o estado do dropdown
    return (
        <>
            <div onClick={toggleOpen}>{children}</div>
            {open && <div className="fixed inset-0 z-40" onClick={() => setOpen(false)}></div>}
        </>
    );
};

// Componente para renderizar o conteúdo do dropdown
const Content = ({ align = 'right', width = '48', contentClasses = 'py-1 bg-white dark:bg-gray-700', children }) => {
    // Usa o contexto para acessar o estado e a função para controlar o dropdown
    const { open, setOpen } = useContext(DropDownContext);

    // Determina as classes de alinhamento do conteúdo do dropdown
    let alignmentClasses = 'origin-top';
    if (align === 'left') {
        alignmentClasses = 'ltr:origin-top-left rtl:origin-top-right start-0';
    } else if (align === 'right') {
        alignmentClasses = 'ltr:origin-top-right rtl:origin-top-left end-0';
    }

    // Determina as classes de largura do conteúdo do dropdown
    let widthClasses = '';
    if (width === '48') {
        widthClasses = 'w-48';
    }

    // Renderiza o conteúdo do dropdown dentro de uma transição
    return (
        <>
            <Transition
                as={Fragment}
                show={open}
                enter="transition ease-out duration-200"
                enterFrom="opacity-0 scale-95"
                enterTo="opacity-100 scale-100"
                leave="transition ease-in duration-75"
                leaveFrom="opacity-100 scale-100"
                leaveTo="opacity-0 scale-95"
            >
                <div
                    className={`absolute z-50 mt-2 rounded-md shadow-lg ${alignmentClasses} ${widthClasses}`}
                    onClick={() => setOpen(false)}
                >
                    <div className={`rounded-md ring-1 ring-black ring-opacity-5 ` + contentClasses}>{children}</div>
                </div>
            </Transition>
        </>
    );
};

// Componente para renderizar um link dentro do dropdown
const DropdownLink = ({ className = '', children, ...props }) => {
    // Renderiza um link usando o componente Link fornecido pelo Inertia.js
    return (
        <Link
            {...props}
            className={
                'block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out ' +
                className
            }
        >
            {children}
        </Link>
    );
};

// Define os componentes secundários como propriedades do componente Dropdown para facilitar o uso
Dropdown.Trigger = Trigger;
Dropdown.Content = Content;
Dropdown.Link = DropdownLink;

export default Dropdown; // Exporta o componente Dropdown para ser usado em outros lugares da aplicação
