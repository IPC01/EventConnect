import React from "react";
import { createNativeStackNavigator } from "@react-navigation/native-stack";
import Home from "../pages/home/home";


const Stack = createNativeStackNavigator();

export default function MainNavigator() {
  return (
    <Stack.Navigator screenOptions={{ headerShown: false }}>
      {/* Mostra a tela de boas-vindas primeiro */}
      <Stack.Screen name="Welcome" component={Home} />
      {/* Depois exibe as abas principais */}
      {/* <Stack.Screen name="Main" component={TabNavigator} /> */}
    </Stack.Navigator>
  );
}
