using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class CrearPuenteController : MonoBehaviour
{
    public GameObject PosFin;
    public GameObject puente;
    private PersonajeController smsPuenteAct;
    public float posX;
    public float posY;
    void Start()
    {
        smsPuenteAct = FindObjectOfType(typeof(PersonajeController)) as PersonajeController;
        
    }

    
    void Update()
    {
        posX = PosFin.GetComponent<Transform>().position.x;
        posY = PosFin.GetComponent<Transform>().position.y;
    }

    void OnTriggerEnter2D(Collider2D colision)
    {
        if (colision.gameObject.tag == "cajaempuja")
        {
            smsPuenteAct.smsPuenteActivado.GetComponent<TextMesh>().text = "!Ahora Puedes Pasar!";
            puente.GetComponent<Transform>().localPosition = new Vector2(posX, posY);
        }

    }


}
