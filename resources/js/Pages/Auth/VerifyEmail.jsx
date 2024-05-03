// Importa os componentes necessários do projeto
import GuestLayout from '@/Layouts/GuestLayout';
import PrimaryButton from '@/Components/PrimaryButton';
import { Head, Link, useForm } from '@inertiajs/react';

// Renderiza o componente VerifyEmail
export default function VerifyEmail({ status }) {
    // Configuração do formulário usando o hook useForm do Inertia
    const { post, processing } = useForm({});

    // Função chamada quando o formulário é submetido
    const submit = (e) => {
        // Previne o comportamento padrão do formulário
        e.preventDefault();
        // Envia uma solicitação para reenviar o email de verificação
        post(route('verification.send'));
    };

    // Renderiza o componente VerifyEmail
    return (
        <GuestLayout>
            {/* Define o título da página */}
            <Head title="Email Verification" />

            <div className="mb-4 text-sm text-gray-600 dark:text-gray-400">
                {/* Mensagem de instrução para verificar o email */}
                Thanks for signing up! Before getting started, could you verify your email address by clicking on the
                link we just emailed to you? If you didn't receive the email, we will gladly send you another.
            </div>

            {/* Verifica o status da verificação do email */}
            {status === 'verification-link-sent' && (
                <div className="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {/* Mensagem informando que um novo link de verificação foi enviado */}
                    A new verification link has been sent to the email address you provided during registration.
                </div>
            )}

            {/* Formulário para reenviar o email de verificação */}
            <form onSubmit={submit}>
                <div className="mt-4 flex items-center justify-between">
                    {/* Botão para reenviar o email de verificação */}
                    <PrimaryButton disabled={processing}>Resend Verification Email</PrimaryButton>
                    {/* Link para fazer logout */}
                    <Link
                        href={route('logout')}
                        method="post"
                        as="button"
                        className="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    >
                        Log Out
                    </Link>
                </div>
            </form>
        </GuestLayout>
    );
}
