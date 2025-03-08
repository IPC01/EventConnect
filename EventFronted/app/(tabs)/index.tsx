
import React, { useState } from 'react';
import { StyleSheet, Text, View, TextInput, TouchableOpacity, SafeAreaView, KeyboardAvoidingView, Platform, ScrollView, Alert } from 'react-native';
import { StatusBar } from 'expo-status-bar';

export default function HomeScreen() {
  const [nome, setNome] = useState('');
  const [email, setEmail] = useState('');
  const [senha, setSenha] = useState('');
  const [confirmarSenha, setConfirmarSenha] = useState('');
  const [erros, setErros] = useState({});

//   const validarFormulario = () => {
//     let novosErros = {};
    
//     // Validar nome
//     if (!nome) novosErros.nome = 'Nome é obrigatório';
    
//     // Validar email
//     if (!email) novosErros.email = 'Email é obrigatório';
//     else if (!/\S+@\S+\.\S+/.test(email)) novosErros.email = 'Email inválido';
    
//     // Validar senha
//     if (!senha) novosErros.senha = 'Senha é obrigatória';
//     else if (senha.length < 6) novosErros.senha = 'A senha deve ter pelo menos 6 caracteres';
    
//     // Validar confirmação de senha
//     if (senha !== confirmarSenha) novosErros.confirmarSenha = 'As senhas não conferem';
    
//     setErros(novosErros);
//     return Object.keys(novosErros).length === 0;
//   };

//   const handleSubmit = () => {
//     if (validarFormulario()) {
//       Alert.alert('Sucesso', 'Registro realizado com sucesso!');
//       // Aqui você adicionaria a lógica para enviar os dados para sua API
//       console.log('Dados do registro:', { nome, email, senha });
//     }
//   };

  return (
    <SafeAreaView style={styles.container}>
      <StatusBar style="auto" />
      <KeyboardAvoidingView
        behavior={Platform.OS === 'ios' ? 'padding' : 'height'}
        style={styles.keyboardView}
      >
        <ScrollView contentContainerStyle={styles.scrollView}>
          <View style={styles.formContainer}>
            <Text style={styles.titulo}>Criar Conta</Text>
            
            <View style={styles.inputContainer}>
              <Text style={styles.label}>Nome</Text>
              <TextInput
                style={styles.input}
                placeholder="Digite seu nome completo"
                value={nome}
                onChangeText={setNome}
              />
              {/* {erros.nome && <Text style={styles.erro}>{erros.nome}</Text>} */}
            </View>
            
            <View style={styles.inputContainer}>
              <Text style={styles.label}>Email</Text>
              <TextInput
                style={styles.input}
                placeholder="Digite seu email"
                value={email}
                onChangeText={setEmail}
                keyboardType="email-address"
                autoCapitalize="none"
              />
              {/* {erros.email && <Text style={styles.erro}>{erros.email}</Text>} */}
            </View>
            
            <View style={styles.inputContainer}>
              <Text style={styles.label}>Senha</Text>
              <TextInput
                style={styles.input}
                placeholder="Digite sua senha"
                value={senha}
                onChangeText={setSenha}
                secureTextEntry
              />
              {/* {erros.senha && <Text style={styles.erro}>{erros.senha}</Text>} */}
            </View>
            
            <View style={styles.inputContainer}>
              <Text style={styles.label}>Confirmar Senha</Text>
              <TextInput
                style={styles.input}
                placeholder="Confirme sua senha"
                value={confirmarSenha}
                onChangeText={setConfirmarSenha}
                secureTextEntry
              />
              {/* {erros.confirmarSenha && <Text style={styles.erro}>{erros.confirmarSenha}</Text>} */}
            </View>
            
            <TouchableOpacity style={styles.botao} >
              <Text style={styles.botaoTexto}>REGISTRAR</Text>
            </TouchableOpacity>
            
            <View style={styles.loginContainer}>
              <Text style={styles.loginTexto}>Já tem uma conta? </Text>
              <TouchableOpacity>
                <Text style={styles.loginLink}>Fazer login</Text>
              </TouchableOpacity>
            </View>
          </View>
        </ScrollView>
      </KeyboardAvoidingView>
    </SafeAreaView>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#f5f5f5',
  },
  keyboardView: {
    flex: 1,
  },
  scrollView: {
    flexGrow: 1,
    justifyContent: 'center',
  },
  formContainer: {
    padding: 20,
    backgroundColor: '#fff',
    borderRadius: 10,
    margin: 20,
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 2 },
    shadowOpacity: 0.1,
    shadowRadius: 3,
    elevation: 3,
  },
  titulo: {
    fontSize: 24,
    fontWeight: 'bold',
    marginBottom: 20,
    textAlign: 'center',
  },
  inputContainer: {
    marginBottom: 15,
  },
  label: {
    fontSize: 16,
    marginBottom: 5,
    color: '#333',
  },
  input: {
    borderWidth: 1,
    borderColor: '#ddd',
    borderRadius: 5,
    padding: 12,
    fontSize: 16,
    backgroundColor: '#f9f9f9',
  },
  erro: {
    color: 'red',
    fontSize: 12,
    marginTop: 5,
  },
  botao: {
    backgroundColor: '#4B0082',
    padding: 15,
    borderRadius: 5,
    alignItems: 'center',
    marginTop: 10,
  },
  botaoTexto: {
    color: '#fff',
    fontSize: 16,
    fontWeight: 'bold',
  },
  loginContainer: {
    flexDirection: 'row',
    justifyContent: 'center',
    marginTop: 20,
  },
  loginTexto: {
    color: '#333',
  },
  loginLink: {
    color: '#4B0082',
    fontWeight: 'bold',
  },
});