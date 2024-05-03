// Importa os componentes necessários do projeto
import { useEffect } from 'react';
import Checkbox from '@/Components/Checkbox';
import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, Link, useForm } from '@inertiajs/react';

// Renderiza o componente Login
export default function Login({ status, canResetPassword }) {
    // Configuração do formulário usando o hook useForm do Inertia
    const { data, setData, post, processing, errors, reset } = useForm({
        email: '',
        password: '',
        remember: false,
    });

    // Efeito usado para limpar o campo de senha quando o componente é desmontado
    useEffect(() => {
        return () => {
            reset('password');
        };
    }, []);

    // Função chamada quando o formulário é submetido
    const submit = (e) => {
        // Previne o comportamento padrão do formulário
        e.preventDefault();
        // Envia os dados do formulário para a rota 'login'
        post(route('login'));
    };

    // Renderiza o componente Login
    return (
        <GuestLayout>
            {/* Define o título da página */}
            <Head title="Log in" />

            {/* Exibe uma mensagem de status, se houver */}
            {status && <div className="mb-4 font-medium text-sm text-green-600">{status}</div>}

            {/* Formulário de login */}
            <form onSubmit={submit}>
                <div>
                    {/* Label e campo de entrada para o endereço de email */}
                    <InputLabel htmlFor="email" value="Email" />
                    <TextInput
                        id="email"
                        type="email"
                        name="email"
                        value={data.email}
                        className="mt-1 block w-full"
                        autoComplete="username"
                        isFocused={true}
                        onChange={(e) => setData('email', e.target.value)}
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
                        autoComplete="current-password"
                        onChange={(e) => setData('password', e.target.value)}
                    />
                    {/* Exibe mensagens de erro relacionadas ao campo de senha */}
                    <InputError message={errors.password} className="mt-2" />
                </div>

                <div className="block mt-4">
                    {/* Checkbox para lembrar o usuário */}
                    <label className="flex items-center">
                        <Checkbox
                            name="remember"
                            checked={data.remember}
                            onChange={(e) => setData('remember', e.target.checked)}
                        />
                        <span className="ms-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
                    </label>
                </div>

                <div className="flex items-center justify-end mt-4">
                    {/* Link para redefinir a senha, se permitido */}
                    {canResetPassword && (
                        <Link
                            href={route('password.request')}
                            className="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        >
                            Forgot your password?
                        </Link>
                    )}

                    {/* Botão de login */}
                    <PrimaryButton className="ms-4" disabled={processing}>
                        Log in
                    </PrimaryButton>
                </div>
            </form>
        </GuestLayout>
    );
}
