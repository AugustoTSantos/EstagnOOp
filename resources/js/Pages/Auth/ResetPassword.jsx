// Importa os componentes necessários do projeto
import { useEffect } from 'react';
import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, useForm } from '@inertiajs/react';

// Renderiza o componente ResetPassword
export default function ResetPassword({ token, email }) {
    // Configuração do formulário usando o hook useForm do Inertia
    const { data, setData, post, processing, errors, reset } = useForm({
        token: token,
        email: email,
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
        // Envia os dados do formulário para a rota 'password.store'
        post(route('password.store'));
    };

    // Renderiza o componente ResetPassword
    return (
        <GuestLayout>
            {/* Define o título da página */}
            <Head title="Reset Password" />

            {/* Formulário de reset de senha */}
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
                        autoComplete="new-password"
                        isFocused={true}
                        onChange={(e) => setData('password', e.target.value)}
                    />
                    {/* Exibe mensagens de erro relacionadas ao campo de senha */}
                    <InputError message={errors.password} className="mt-2" />
                </div>

                <div className="mt-4">
                    {/* Label e campo de entrada para confirmar a senha */}
                    <InputLabel htmlFor="password_confirmation" value="Confirm Password" />
                    <TextInput
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        value={data.password_confirmation}
                        className="mt-1 block w-full"
                        autoComplete="new-password"
                        onChange={(e) => setData('password_confirmation', e.target.value)}
                    />
                    {/* Exibe mensagens de erro relacionadas ao campo de confirmação de senha */}
                    <InputError message={errors.password_confirmation} className="mt-2" />
                </div>

                <div className="flex items-center justify-end mt-4">
                    {/* Botão de reset de senha */}
                    <PrimaryButton className="ms-4" disabled={processing}>
                        Reset Password
                    </PrimaryButton>
                </div>
            </form>
        </GuestLayout>
    );
}
