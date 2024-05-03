// Importa o hook useEffect da biblioteca React
import { useEffect } from 'react';

// Importa os componentes necessários do projeto
import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';

// Importa o componente Head e o hook useForm da biblioteca InertiaJS React
import { Head, useForm } from '@inertiajs/react';

// Renderiza o componente ConfirmPassword
export default function ConfirmPassword() {
    // Configuração do formulário usando o hook useForm do Inertia
    const { data, setData, post, processing, errors, reset } = useForm({
        password: '',
    });

    // Efeito que é executado quando o componente é montado
    useEffect(() => {
        // Retorna uma função de limpeza que será executada quando o componente for desmontado
        return () => {
            // Reseta o campo de senha para seu estado inicial
            reset('password');
        };
    }, []); // Array de dependências vazio, indica que o efeito será executado apenas uma vez ao montar o componente

    // Função chamada quando o formulário é submetido
    const submit = (e) => {
        // Previne o comportamento padrão do formulário
        e.preventDefault();
        // Envia os dados do formulário para a rota 'password.confirm'
        post(route('password.confirm'));
    };

    // Renderiza o componente ConfirmPassword
    return (
        <GuestLayout>
            {/* Define o título da página */}
            <Head title="Confirm Password" />

            {/* Exibe uma mensagem informativa */}
            <div className="mb-4 text-sm text-gray-600 dark:text-gray-400">
                This is a secure area of the application. Please confirm your password before continuing.
            </div>

            {/* Formulário de confirmação de senha */}
            <form onSubmit={submit}>
                <div className="mt-4">
                    {/* Rótulo do campo de senha */}
                    <InputLabel htmlFor="password" value="Password" />

                    {/* Campo de entrada para a senha */}
                    <TextInput
                        id="password"
                        type="password"
                        name="password"
                        value={data.password}
                        className="mt-1 block w-full"
                        isFocused={true}
                        onChange={(e) => setData('password', e.target.value)}
                    />

                    {/* Exibe mensagens de erro relacionadas ao campo de senha */}
                    <InputError message={errors.password} className="mt-2" />
                </div>

                {/* Botão de confirmação */}
                <div className="flex items-center justify-end mt-4">
                    <PrimaryButton className="ms-4" disabled={processing}>
                        Confirm
                    </PrimaryButton>
                </div>
            </form>
        </GuestLayout>
    );
}
