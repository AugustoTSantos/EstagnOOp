// Importa os componentes necessários do projeto
import { useEffect } from 'react';
import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, Link, useForm } from '@inertiajs/react';

// Renderiza o componente Register
export default function Register() {
    // Configuração do formulário usando o hook useForm do Inertia
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    // Efeito usado para limpar os campos de senha quando o componente é desmontado
    useEffect(() => {
        return () => {
            reset('password', 'password_confirmation');
        };
    }, []);

    // Função chamada quando o formulário é submetido
    const submit = (e) => {
        // Previne o comportamento padrão do formulário
        e.preventDefault();
        // Envia os dados do formulário para a rota 'register'
        post(route('register'));
    };

    // Renderiza o componente Register
    return (
        <GuestLayout>
            {/* Define o título da página */}
            <Head title="Register" />

            {/* Formulário de registro */}
            <form onSubmit={submit}>
                <div>
                    {/* Label e campo de entrada para o nome */}
                    <InputLabel htmlFor="name" value="Name" />
                    <TextInput
                        id="name"
                        name="name"
                        value={data.name}
                        className="mt-1 block w-full"
                        autoComplete="name"
                        isFocused={true}
                        onChange={(e) => setData('name', e.target.value)}
                        required
                    />
                    {/* Exibe mensagens de erro relacionadas ao campo de nome */}
                    <InputError message={errors.name} className="mt-2" />
                </div>

                <div className="mt-4">
                    {/* Label e campo de entrada para o endereço de email */}
                    <InputLabel htmlFor="email" value="Email" />
                    <TextInput
                        id="email"
                        type="email"
                        name="email"
                        value={data.email}
                        className="mt-1 block w-full"
                        autoComplete="username"
                        onChange={(e) => setData('email', e.target.value)}
                        required
                    />
                    {/* Exibe mensagens de erro relacionadas ao campo de email */}
                    <InputError message={errors.email} className="mt-2" />
                </div>

                <div className="mt-4">
                    {/* Label e campo de entrada para a senha */}
                    <InputLabel htmlFor="password" value="Password" />
                    <TextInput
                        id="password"
                        type="password"
                        name="password"
                        value={data.password}
                        className="mt-1 block w-full"
                        autoComplete="new-password"
                        onChange={(e) => setData('password', e.target.value)}
                        required
                    />
                    {/* Exibe mensagens de erro relacionadas ao campo de senha */}
                    <InputError message={errors.password} className="mt-2" />
                </div>

                <div className="mt-4">
                    {/* Label e campo de entrada para confirmar a senha */}
                    <InputLabel htmlFor="password_confirmation" value="Confirm Password" />
                    <TextInput
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        value={data.password_confirmation}
                        className="mt-1 block w-full"
                        autoComplete="new-password"
                        onChange={(e) => setData('password_confirmation', e.target.value)}
                        required
                    />
                    {/* Exibe mensagens de erro relacionadas ao campo de confirmação de senha */}
                    <InputError message={errors.password_confirmation} className="mt-2" />
                </div>

                <div className="flex items-center justify-end mt-4">
                    {/* Link para a página de login */}
                    <Link
                        href={route('login')}
                        className="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    >
                        Already registered?
                    </Link>

                    {/* Botão de registro */}
                    <PrimaryButton className="ms-4" disabled={processing}>
                        Register
                    </PrimaryButton>
                </div>
            </form>
        </GuestLayout>
    );
}
