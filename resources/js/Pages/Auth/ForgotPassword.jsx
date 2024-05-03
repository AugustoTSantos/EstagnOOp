// Importa os componentes necessários do projeto
import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, useForm } from '@inertiajs/react';

// Renderiza o componente ForgotPassword
export default function ForgotPassword({ status }) {
    // Configuração do formulário usando o hook useForm do Inertia
    const { data, setData, post, processing, errors } = useForm({
        email: '',
    });

    // Função chamada quando o formulário é submetido
    const submit = (e) => {
        // Previne o comportamento padrão do formulário
        e.preventDefault();
        // Envia os dados do formulário para a rota 'password.email'
        post(route('password.email'));
    };

    // Renderiza o componente ForgotPassword
    return (
        <GuestLayout>
            {/* Define o título da página */}
            <Head title="Forgot Password" />

            {/* Exibe uma mensagem informativa */}
            <div className="mb-4 text-sm text-gray-600 dark:text-gray-400">
                Forgot your password? No problem. Just let us know your email address and we will email you a password
                reset link that will allow you to choose a new one.
            </div>

            {/* Exibe uma mensagem de status, se houver */}
            {status && <div className="mb-4 font-medium text-sm text-green-600 dark:text-green-400">{status}</div>}

            {/* Formulário para solicitar um link de redefinição de senha */}
            <form onSubmit={submit}>
                {/* Campo de entrada para o endereço de email */}
                <TextInput
                    id="email"
                    type="email"
                    name="email"
                    value={data.email}
                    className="mt-1 block w-full"
                    isFocused={true}
                    onChange={(e) => setData('email', e.target.value)}
                />

                {/* Exibe mensagens de erro relacionadas ao campo de email */}
                <InputError message={errors.email} className="mt-2" />

                {/* Botão para enviar o link de redefinição de senha */}
                <div className="flex items-center justify-end mt-4">
                    <PrimaryButton className="ms-4" disabled={processing}>
                        Email Password Reset Link
                    </PrimaryButton>
                </div>
            </form>
        </GuestLayout>
    );
}
